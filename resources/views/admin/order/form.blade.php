<div class="row">
    <div class="md-4">
        <div class="card-header">
            Информация о заказчике
        </div>
        <ul class="timeline">
            <li class="timeline__item">
                <span class="timeline__point"></span>
                <div class="timeline__event">
                    <div class="timeline__header">
                        Имя
                    </div>
                    <p>{{ $model->name }}</p>
                </div>
            </li>
            <li class="timeline__item">
                <span class="timeline__point"></span>
                <div class="timeline__event">
                    <div class="timeline__header">
                        Телефон
                    </div>
                    <p>{{ $model->phone }}</p>
                </div>
            </li>
            <li class="timeline__item">
                <span class="timeline__point"></span>
                <div class="timeline__event">
                    <div class="timeline__header">
                        Email
                    </div>
                    <p>{{ $model->email }}</p>
                </div>
            </li>
            <li class="timeline__item">
                <span class="timeline__point"></span>
                <div class="timeline__event">
                    <div class="timeline__header">
                        Адрес доставки
                    </div>
                    <p>{{ $model->address }}</p>
                </div>
            </li>
            <li class="timeline__item">
                <span class="timeline__point"></span>
                <div class="timeline__event">
                    <div class="timeline__header">
                        Время доставки
                    </div>
                    <p>{{ $model->delivery_time }}</p>
                </div>
            </li>
            <li class="timeline__item">
                <span class="timeline__point"></span>
                <div class="timeline__event">
                    <div class="timeline__header">
                        Пожелания
                    </div>
                    <p>{{ $model->comment }}</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="md-8">
        <div class="card-header">
            Заказ #{{ $model->id }} от {{ date('d.m.Y', strtotime($model->created_at)) }}
        </div>
        <div class="table-responsive mart">
            <table class="table-stripped">
                <tr>
                    <th></th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Стоимость</th>
                </tr>
                @foreach ($model->orderItems as $item)
                    <tr>
                        <td><img src="{{ ImageHelper::thumb($item->image, 50, 50) }}" alt="" /></td>
                        <td>{{ $item->header }}</td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->price }}<span class="rub">₽</span></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="total">Стоимость заказа:</td>
                    <td class="total-price">{{ $model->full_price }}<span class="rub">₽</span></td>
                </tr>
            </table>
        </div>
        <div class="row mart">
            <div class="md-6">
                <div class="form-group @error('status') has-error @enderror">
                    <label>Статус</label>
                    <select id="order_status" name="status">
                        @foreach ($model::STATUSES as $key => $status)
                            <option value="{{ $key }}" @if ($model->status == $key) selected @endif >
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @enderror
                </div>
            </div>
            <div class="md-6">
                <div class="form-group @error('payment') has-error @enderror">
                    <label>Оплата</label>
                    <select id="payment_status" name="payment">
                        @foreach ($model::PAYMENTS as $key => $status)
                            <option value="{{ $key }}" @if ($model->payment == $key) selected @endif >
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                    @error('payment')
                        <span class="text-danger">{{ $errors->first('payment') }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
