<!--

    @Params

    Array $articleFormData['buttonText','buttonIcon'];
    Article $article;
    String $action;

-->

<div class="input-field">

    <input name="title" type="text" value="{{ $action === 'create' ? old('title') : $article->title }}" required />

    <label for="title">Article Title: </label>

</div>

<div class="input-field">

    <input type="text" name="description" value="{{ $action === 'create' ? old('description') : $article->description }}" required />

    <label for="description">Article Description: </label>

</div>

<div class="file-field input-field">

    <div class="btn red darken-2 waves-effect waves-light">

      <span><i class="material-icons left">insert_photo</i>Article Image</span>

      <input name="image_file" type="file" required />

    </div>

    <div class="file-path-wrapper">

        <input name="image_name" class="file-path" type="text" readonly />

    </div>

</div>

<h5>Article Contents</h5>

<div class="input-field">

    <textarea class="ckeditor" name="body" required>
        
        {!! $action === 'create' ? old('body') : $article->body !!}

    </textarea>

</div>

<div class="input-field">

    <label>Publish on: </label>

    <input name="published_at" type="date" class="datepicker"  value="{{ $action === 'create' ? old('published_at') : $article->published_at->format('j F, Y') }}" required />

</div>

<div class="input-field">

    <button class="btn waves-effect waves-light red darken-2">

        <i class="material-icons right">{{ $articleFormData['buttonIcon'] }}</i>

        {{ $articleFormData['buttonText'] }}

    </button>

</div>

