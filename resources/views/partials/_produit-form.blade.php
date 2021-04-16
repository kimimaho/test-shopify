@csrf

<div class="form-group">
<label for="designation">Designation</label>
<input type="text" value="{{ old('designation') ?? $produit->designation }}" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
    @error('designation')
        <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
<label for="prix">Prix</label>
<input type="text" value="{{ old('prix') ?? $produit->prix}}" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
    @error('prix')
        <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
<label for="category_id">Catégorie</label>
<select class="form-control" name="category_id" id="">
    @foreach ($categories as $category)
        <option {{ $produit->category_id== $category->id OR old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->libelle }}</option>
    @endforeach
</select>
@error('category_id')
    <small id="helpId" class="text-danger">{{ $message }}</small>
@enderror
</div>
<div class="form-group">
<label for="">Description</label>
<textarea class="form-control" name="description" id="" rows="3">
    {{ old('description') ?? $produit->description}}
</textarea>
@error('description')
    <small id="helpId" class="text-danger">{{ $message }}</small>
@enderror
</div>
<div class="form-group">
  <label for="image">Image</label>
  <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
  <small id="fileHelpId" class="form-text text-muted">Help text</small>
</div>
<button type="submit" class="btn btn-primary btn-block btn-lg">Enregistrer</button>
