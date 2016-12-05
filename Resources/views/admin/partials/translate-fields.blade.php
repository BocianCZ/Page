<div class="box-body">
    <div class="box-body">
        <div class="row">
            <div class='col-md-6 form-group'>
                {!! Form::label("{$defaultLanguage}[title]", trans('page::pages.form.title')) !!}
                {!! Form::text("{$defaultLanguage}[title]", $page->translate($defaultLanguage)->title, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class='col-md-6 form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
                {!! Form::label("[title]", trans('page::pages.form.title')) !!}
                <?php $old = $page->hasTranslation($lang) ? $page->translate($lang)->title : '' ?>
                {!! Form::text("title", old("title", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('page::pages.form.title')]) !!}
                {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class='col-md-6 form-group'>
                {!! Form::label("{$defaultLanguage}[slug]", trans('page::pages.form.slug')) !!}
                {!! Form::text("{$defaultLanguage}[slug]", $page->translate($defaultLanguage)->slug, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class='col-md-6 form-group{{ $errors->has("{$lang}[slug]") ? ' has-error' : '' }}'>
                {!! Form::label("slug", trans('page::pages.form.slug')) !!}
                <?php $old = $page->hasTranslation($lang) ? $page->translate($lang)->slug : '' ?>
                {!! Form::text("slug", old("slug", $old), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('page::pages.form.slug')]) !!}
                {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="row">
            <div class='col-md-6'>
                {!! Form::label("{$defaultLanguage}[body]", trans('page::pages.form.body')) !!}
                <textarea class="ckeditor" name="{{$defaultLanguage}}[body]" rows="10" cols="80" disabled>{!! $page->translate($defaultLanguage)->body !!}</textarea>
                {!! $errors->first("{$lang}.body", '<span class="help-block">:message</span>') !!}
            </div>

            <div class='col-md-6 {{ $errors->has("body") ? ' has-error' : '' }}'>
                {!! Form::label("body", trans('page::pages.form.body')) !!}
                <?php $old = $page->hasTranslation($lang) ? $page->translate($lang)->body : '' ?>
                <textarea class="ckeditor" name="body" rows="10" cols="80">{!! old("body", $old) !!}</textarea>
                {!! $errors->first("body", '<span class="help-block">:message</span>') !!}
            </div>

        </div>

        <?php if (config('asgard.page.config.partials.translatable.edit') !== []): ?>
        <?php foreach (config('asgard.page.config.partials.translatable.edit') as $partial): ?>
        @include($partial)
        <?php endforeach; ?>
        <?php endif; ?>


    </div>
    <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-{{$lang}}">
                        {{ trans('page::pages.form.meta_data') }}
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseTwo-{{$lang}}" class="panel-collapse collapse">
                <div class="box-body">
                    <div class="row">
                        <div class='col-md-6 form-group'>
                            {!! Form::label("{$defaultLanguage}[meta_title]", trans('page::pages.form.meta_title')) !!}
                            {!! Form::text("{$defaultLanguage}[meta_title]", $page->translate($defaultLanguage)->meta_title,
                                ['class' => "form-control", 'placeholder' => trans('page::pages.form.meta_title'), 'disabled']) !!}
                        </div>
                        <div class='col-md-6 form-group{{ $errors->has("meta_title") ? ' has-error' : '' }}'>
                            {!! Form::label("meta_title", trans('page::pages.form.meta_title')) !!}
                            <?php $old = $page->hasTranslation($lang) ? $page->translate($lang)->meta_title : '' ?>
                            {!! Form::text("meta_title", old("meta_title", $old), ['class' => "form-control", 'placeholder' => trans('page::pages.form.meta_title')]) !!}
                            {!! $errors->first("meta_title", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6 form-group'>
                            {!! Form::label("{$defaultLanguage}[meta_description]", trans('page::pages.form.meta_description')) !!}
                            <textarea disabled class="form-control" name="{{$lang}}[meta_description]" rows="10" cols="80">{{ $page->translate($defaultLanguage)->meta_description }}</textarea>
                        </div>
                        <div class='col-md-6 form-group{{ $errors->has("{$lang}[meta_description]") ? ' has-error' : '' }}'>
                            {!! Form::label("meta_description", trans('page::pages.form.meta_description')) !!}
                            <?php $old = $page->hasTranslation($lang) ? $page->translate($lang)->meta_description : '' ?>
                            <textarea class="form-control" name="meta_description" rows="10" cols="80">{{ old("meta_description", $old) }}</textarea>
                            {!! $errors->first("meta_description", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFacebook-{{$lang}}">
                        {{ trans('page::pages.form.facebook_data') }}
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseFacebook-{{$lang}}" class="panel-collapse collapse">
                <div class="box-body">
                    <div class="row">
                        <div class='col-md-6 form-group'>
                            {!! Form::label("{$defaultLanguage}[og_title]", trans('page::pages.form.og_title')) !!}
                            {!! Form::text("{$defaultLanguage}[og_title]", $page->translate($defaultLanguage)->og_title,
                                ['class' => "form-control", 'placeholder' => trans('page::pages.form.og_title'), 'disabled']) !!}
                            {!! $errors->first("{$defaultLanguage}[og_title]", '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class='col-md-6 form-group{{ $errors->has("{$lang}[og_title]") ? ' has-error' : '' }}'>
                            {!! Form::label("og_title", trans('page::pages.form.og_title')) !!}
                            <?php $old = $page->hasTranslation($lang) ? $page->translate($lang)->og_title : '' ?>
                            {!! Form::text("og_title", old("{$lang}.og_title", $old), ['class' => "form-control", 'placeholder' => trans('page::pages.form.og_title')]) !!}
                            {!! $errors->first("og_title", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-6 form-group'>
                            {!! Form::label("{$defaultLanguage}[og_description]", trans('page::pages.form.og_description')) !!}
                            <textarea class="form-control" name="{{$defaultLanguage}}[og_description]" rows="10" cols="80" disabled>{{ $page->translate($defaultLanguage)->og_description }}</textarea>
                        </div>
                        <div class='col-md-6 form-group{{ $errors->has("og_description") ? ' has-error' : '' }}'>
                            {!! Form::label("og_description", trans('page::pages.form.og_description')) !!}
                            <?php $old = $page->hasTranslation($lang) ? $page->translate($lang)->og_description : '' ?>
                            <textarea class="form-control" name="og_description" rows="10" cols="80">{{ old("og_description", $old) }}</textarea>
                            {!! $errors->first("og_description", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{ trans('page::pages.form.og_type') }}</label>
                            <?php $oldType = $page->translate($defaultLanguage)->og_type ?>
                            <select class="form-control" name="{{ $defaultLanguage }}[og_type]" disabled>
                                <option value="website" {{ $oldType == 'website' ? 'selected' : ''}}>
                                    {{ trans('page::pages.facebook-types.website') }}
                                </option>
                                <option value="product" {{ $oldType == 'product' ? 'selected' : ''}}>
                                    {{ trans('page::pages.facebook-types.product') }}
                                </option>
                                <option value="article" {{ $oldType == 'article' ? 'selected' : ''}}>
                                    {{ trans('page::pages.facebook-types.article') }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group{{ $errors->has("og_type") ? ' has-error' : '' }}">
                            <label>{{ trans('page::pages.form.og_type') }}</label>
                            <?php $oldType = $page->hasTranslation($lang) ? $page->translate($lang)->og_type : '' ?>
                            <?php $oldType = null !== old("og_type") ? old("og_type") : $oldType; ?>
                            <select class="form-control" name="og_type">
                                <option value="website" {{ $oldType == 'website' ? 'selected' : ''}}>
                                    {{ trans('page::pages.facebook-types.website') }}
                                </option>
                                <option value="product" {{ $oldType == 'product' ? 'selected' : ''}}>
                                    {{ trans('page::pages.facebook-types.product') }}
                                </option>
                                <option value="article" {{ $oldType == 'article' ? 'selected' : ''}}>
                                    {{ trans('page::pages.facebook-types.article') }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
