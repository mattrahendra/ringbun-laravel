<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
Use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Pesanan';

    protected static ?string $modelLabel = 'Pesanan';

    protected static ?string $pluralModelLabel = 'Pesanan';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pesanan')
                    ->schema([
                        Forms\Components\TextInput::make('order_code')
                            ->label('Kode Pesanan')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'confirmed' => 'Dikonfirmasi',
                                'processing' => 'Diproses',
                                'ready' => 'Siap Diambil',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan'
                            ])
                            ->default('pending')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Informasi Pelanggan')
                    ->schema([
                        Forms\Components\TextInput::make('customer_name')
                            ->label('Nama Pelanggan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('customer_phone')
                            ->label('No. Telepon')
                            ->required()
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\Textarea::make('customer_address')
                            ->label('Alamat')
                            ->required()
                            ->rows(3),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Detail Pembayaran')
                    ->schema([
                        Forms\Components\TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('tax')
                            ->label('PPN (11%)')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('discount')
                            ->label('Diskon')
                            ->numeric()
                            ->default(0)
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('promo_code')
                            ->label('Kode Promo')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('total')
                            ->label('Total')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Item Pesanan')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->label('Item')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Produk')
                                    ->required(),
                                Forms\Components\TextInput::make('price')
                                    ->label('Harga')
                                    ->required()
                                    ->numeric()
                                    ->prefix('Rp'),
                                Forms\Components\TextInput::make('quantity')
                                    ->label('Jumlah')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1),
                                Forms\Components\TextInput::make('category')
                                    ->label('Kategori'),
                            ])
                            ->columns(4)
                            ->collapsible()
                            ->defaultItems(0)
                            ->addActionLabel('Tambah Item')
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_code')
                    ->label('Kode Pesanan')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Kode pesanan disalin!')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('customer_phone')
                    ->label('No. Telepon')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Nomor telepon disalin!'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'primary' => 'confirmed',
                        'info' => 'processing',
                        'success' => fn ($state) => in_array($state, ['ready', 'completed']),
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'confirmed' => 'Dikonfirmasi',
                        'processing' => 'Diproses',
                        'ready' => 'Siap Diambil',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('items_count')
                    ->label('Jumlah Item')
                    ->getStateUsing(function (Order $record) {
                        return collect($record->items)->sum('quantity');
                    })
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pesanan')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Dikonfirmasi',
                        'processing' => 'Diproses',
                        'ready' => 'Siap Diambil',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan'
                    ]),

                Filter::make('created_at')
                    ->label('Tanggal Pesanan')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('whatsapp')
                    ->label('WhatsApp')
                    ->icon('heroicon-m-chat-bubble-left-right')
                    ->color('success')
                    ->url(function (Order $record) {
                        $message = self::formatWhatsAppMessage($record);
                        $phone = preg_replace('/[^0-9]/', '', $record->customer_phone);
                        if (substr($phone, 0, 1) === '0') {
                            $phone = '62' . substr($phone, 1);
                        }
                        return "https://wa.me/{$phone}?text=" . urlencode($message);
                    })
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Pesanan')
                    ->schema([
                        Infolists\Components\TextEntry::make('order_code')
                            ->label('Kode Pesanan')
                            ->badge()
                            ->color('primary'),
                        Infolists\Components\TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'confirmed' => 'primary',
                                'processing' => 'info',
                                'ready', 'completed' => 'success',
                                'cancelled' => 'danger',
                                default => 'gray',
                            })
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'pending' => 'Pending',
                                'confirmed' => 'Dikonfirmasi',
                                'processing' => 'Diproses',
                                'ready' => 'Siap Diambil',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan',
                                default => $state,
                            }),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Tanggal Pesanan')
                            ->dateTime('d/m/Y H:i'),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Informasi Pelanggan')
                    ->schema([
                        Infolists\Components\TextEntry::make('customer_name')
                            ->label('Nama Pelanggan'),
                        Infolists\Components\TextEntry::make('customer_phone')
                            ->label('No. Telepon')
                            ->copyable()
                            ->copyMessage('Nomor telepon disalin!'),
                        Infolists\Components\TextEntry::make('customer_address')
                            ->label('Alamat')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Detail Pembayaran')
                    ->schema([
                        Infolists\Components\TextEntry::make('subtotal')
                            ->label('Subtotal')
                            ->money('IDR'),
                        Infolists\Components\TextEntry::make('tax')
                            ->label('PPN (11%)')
                            ->money('IDR'),
                        Infolists\Components\TextEntry::make('discount')
                            ->label('Diskon')
                            ->money('IDR')
                            ->visible(fn ($record) => $record->discount > 0),
                        Infolists\Components\TextEntry::make('promo_code')
                            ->label('Kode Promo')
                            ->badge()
                            ->color('success')
                            ->visible(fn ($record) => !empty($record->promo_code)),
                        Infolists\Components\TextEntry::make('total')
                            ->label('Total')
                            ->money('IDR')
                            ->size('lg')
                            ->weight('bold')
                            ->color('success'),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Item Pesanan')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('items')
                            ->label('')
                            ->schema([
                                Infolists\Components\TextEntry::make('name')
                                    ->label('Produk'),
                                Infolists\Components\TextEntry::make('category')
                                    ->label('Kategori')
                                    ->badge(),
                                Infolists\Components\TextEntry::make('price')
                                    ->label('Harga')
                                    ->money('IDR'),
                                Infolists\Components\TextEntry::make('quantity')
                                    ->label('Jumlah')
                                    ->badge()
                                    ->color('primary'),
                                Infolists\Components\TextEntry::make('total')
                                    ->label('Subtotal')
                                    ->getStateUsing(fn ($record) => $record['price'] * $record['quantity'])
                                    ->money('IDR')
                                    ->weight('bold'),
                            ])
                            ->columns(5)
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            // 'view' => Pages\ww::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    private static function formatWhatsAppMessage(Order $order): string
    {
        $message = "*UPDATE PESANAN RING BUN*\n\n";
        $message .= "*Kode Pesanan:* {$order->order_code}\n";
        $message .= "*Nama:* {$order->customer_name}\n";
        $message .= "*Status:* " . match($order->status) {
            'pending' => 'Menunggu Konfirmasi',
            'confirmed' => 'Pesanan Dikonfirmasi',
            'processing' => 'Sedang Diproses',
            'ready' => 'Siap Diambil/Dikirim',
            'completed' => 'Pesanan Selesai',
            'cancelled' => 'Pesanan Dibatalkan',
            default => $order->status,
        } . "\n\n";

        $message .= "*Detail Pesanan:*\n";
        $index = 1;
        foreach ($order->items as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $message .= "{$index}. {$item['name']} x{$item['quantity']} - Rp " . number_format($itemTotal, 0, ',', '.') . "\n";
            $index++;
        }

        $message .= "\n*Total: Rp " . number_format($order->total, 0, ',', '.') . "*\n\n";
        $message .= "Terima kasih telah berbelanja di Ring Bun! 🙏";

        return $message;
    }
}
