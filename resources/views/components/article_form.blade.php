@csrf

<label for="name">Titel</label>
<br>
<textarea id="name" name="name" required>@if(isset($article)){{ $article->name; }}@endif</textarea>
<br><br>
<label for="entry">Tekst</label>
<br>

<textarea id="entry" name="entry" required>@if(isset($article)){{ $article->entry; }}@endif</textarea>
<br><br>

<select id="category_id" name="category_id[]" multiple>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach   
</select>
<br><br>

<input type="hidden" id="premium" name="premium" value=0>

@if($user->premium)				
    <input type="checkbox" id="premium" name="premium" value=1>
    <label for="premium">Premium?</label>
    
    <br><br>
@endif

<label for="file">Plaatje</label>
<input type="file" name="fileToUpload" id="fileToUpload">

<input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">

<x-button type="submit">Opslaan</x-button>