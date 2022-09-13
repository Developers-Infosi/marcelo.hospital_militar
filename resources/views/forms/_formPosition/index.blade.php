<div class="col-md-12">
    <div class="form-group">
        <label for="name">Nome do Cargo</label>
        <input  name="name"
            placeholder="Nome do Cargo" value="{{ isset($position->name)? $position->name: old('name') }}" type="text" class="form-control" id="validationCustom001" required>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea name="description"  value="{{ isset($position->description)? $position->description: old('description') }}" rows="6" id="editor1" class="form-control" placeholder="Descrição do Departamento">
            {{ isset($position->description) ? $position->description : old('description') }}
        </textarea>
    </div>
</div>
</div>
