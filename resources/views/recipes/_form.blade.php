@csrf
<div class="form-group">
    <label for="title">Título Receta</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $recipe->title) }}" />
    @error('title')
        <small class="alert alert-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="category">Categoría:</label>
    <br>
    
    <select name="category_id">
        
        @foreach ($categories as $category)
        
            @if( $recipe->category_id == $category->id)
                <option selected value="{{$category->id}}">{{$category->category}}</option>
            @else
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endif
        @endforeach
    </select>
    
</div>

<div class="form-group">
    <label for="ingredient">Ingredientes:</label>
    <textarea name="ingredient" id="ingredient" class="form-control" value="">{{ old('ingredient', $recipe->ingredient) }}</textarea>  
    @error('ingredient')
        <small class="alert alert-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="preparation">Preparación:</label>
    <textarea name="preparation" id="preparation" class="form-control" value="">{{ old('preparation', $recipe->preparation) }}</textarea>  
    @error('preparation')
        <small class="alert alert-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="pic_recipes">Agregar imagen:</label>
    <input type="file" name="pic_recipes" id="pic_recipes" class="form-control" value="{{ old('pic_recipes', $recipe->pic_recipes) }}"/>
    @error('pic_recipes')
        <small class="alert alert-danger">{{ $message }}</small>
    @enderror
</div>

