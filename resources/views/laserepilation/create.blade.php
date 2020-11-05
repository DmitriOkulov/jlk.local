@extends('layouts.app')

@section('content')
<h1>Добавить Лазерную эпиляцию</h1>
    <form method="POST" action="{{ route('laserepilation.store') }}">
        @csrf
        <div class="form-group">
            <label for="date" class="col-form-label">Дата</label>
            <input id="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" type="date" value="{{ date('Y-m-d') }}">
            @if ($errors->has('date'))
                <span class="invalid-feedback"><strong>{{ $errors->first('date') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="percent" class="col-form-label">Процент</label>
            <input id="percent" class="form-control{{ $errors->has('percent') ? ' is-invalid' : '' }}" name="percent" type="text" value="{{ old('percent') }}" required>
            @if ($errors->has('percent'))
                <span class="invalid-feedback"><strong>{{ $errors->first('percent') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="zone" class="col-form-label {{ $errors->has('zone') ? ' is-invalid' : '' }}">Зоны</label>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Стрижка женская" @if(old('zone')) @foreach(old('zone') as $zone) @if($zone=='Стрижка женская') checked @endif @endforeach @endif><span> Стрижка женская</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Маникюр" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Маникюр') checked @endif @endforeach @endif><span> Маникюр</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Голени с коленями" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Голени с коленями') checked @endif @endforeach @endif><span> Голени с коленями</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Бедра полностью" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Бедра полностью') checked @endif @endforeach @endif><span> Бедра полностью</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Ноги полностью" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Ноги полностью') checked @endif @endforeach @endif><span> Ноги полностью</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Ягодицы" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Ягодицы') checked @endif @endforeach @endif><span> Ягодицы</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Подмышки" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Подмышки') checked @endif @endforeach @endif><span> Подмышки</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Руки полностью" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Руки полностью') checked @endif @endforeach @endif><span> Руки полностью</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Руки до локтя" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Руки до локтя') checked @endif @endforeach @endif><span> Руки до локтя</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Глубокое бикини" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Глубокое бикини') checked @endif @endforeach @endif><span> Глубокое бикини</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Верхняя губа, подбородок" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Верхняя губа, подбородок') checked @endif @endforeach @endif><span> Верхняя губа, подбородок</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Классическое бикини" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Классическое бикини') checked @endif @endforeach @endif><span> Классическое бикини</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Лицо полностью" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Лицо полностью') checked @endif @endforeach @endif><span> Лицо полностью</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Шея" @if(old('zone'))  @foreach(old('zone') as $zone) @if($zone=='Шея') checked @endif @endforeach @endif><span> Шея</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Щеки, бакенбарды" @if(old('zone')) @foreach(old('zone') as $zone) @if($zone=='Щеки, бакенбарды') checked @endif @endforeach @endif><span> Щеки, бакенбарды</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Грудь полностью" @if(old('zone')) @foreach(old('zone') as $zone) @if($zone=='Грудь полностью') checked @endif @endforeach @endif><span> Грудь полностью</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Ореолы" @if(old('zone')) @foreach(old('zone') as $zone) @if($zone=='Ореолы') checked @endif @endforeach @endif><span> Ореолы</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Спина полностью" @if(old('zone')) @foreach(old('zone') as $zone) @if($zone=='Спина полностью') checked @endif @endforeach @endif><span> Спина полностью</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Живот полностью" @if(old('zone')) @foreach(old('zone') as $zone) @if($zone=='Живот полностью') checked @endif @endforeach @endif><span> Живот полностью</span>
            </div>
            <div class="form_check">
                <input name="zone[]" type="checkbox" value="Линия живота до пупка" @if(old('zone')) @foreach(old('zone') as $zone) @if($zone=='Линия живота до пупка') checked @endif @endforeach @endif><span> Линия живота до пупка</span>
            </div>
            @if ($errors->has('zone'))
                <span class="invalid-feedback"><strong>{{ $errors->first('zone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="ms" class="col-form-label">мс</label>
            <input id="ms" class="form-control{{ $errors->has('ms') ? ' is-invalid' : '' }}" type="text" name="ms" value="{{ old('ms') }}">
            @if ($errors->has('ms'))
                <span class="invalid-feedback"><strong>{{ $errors->first('ms') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="gc" class="col-form-label">Гц</label>
            <input id="gc" class="form-control{{ $errors->has('gc') ? ' is-invalid' : '' }}" type="text" name="gc" value="{{ old('gc') }}">
            @if ($errors->has('gc'))
                <span class="invalid-feedback"><strong>{{ $errors->first('gc') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="comment" class="col-form-label">Комментарий</label>
            <textarea name="comment">{{ old('comment') }}</textarea>
        </div>

        <input type="hidden" name="id_visitor" value="{{ $_GET['visitor'] }}">
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </form>
@endsection
