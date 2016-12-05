@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('page::pages.title.translate page') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.page.page.index') }}">{{ trans('page::pages.title.pages') }}</a></li>
        <li class="active">{{ trans('page::pages.title.translate page') }}</li>
    </ol>
@stop

@section('styles')
    <style>
        .checkbox label {
            padding-left: 0;
        }
    </style>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.page.page.translate', $page->id, $language], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('page::admin.partials.translate-fields', ['lang' => $language])

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat" name="button" value="index" >
                        <i class="fa fa-angle-left"></i>
                        {{ trans('core::core.button.update and back') }}
                    </button>
                    <button type="submit" class="btn btn-primary btn-flat">
                        {{ trans('core::core.button.update') }}
                    </button>
                    <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.page.page.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div>

    </div>

    {!! Form::close() !!}
@stop

@section('scripts')
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
