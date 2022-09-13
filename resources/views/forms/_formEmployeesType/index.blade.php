<div class="col-md-12">
    <div class="form-group">
        <label for="Tipo de Funcionario">Tipo de Funcionario</label>
        <input  name="name"
            placeholder="Tipo de Funcionario" value="{{ isset($employees_types->name)? $employees_types->name: old('name') }}" type="text" class="form-control" id="validationCustom001" required>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea name="description"  value="{{ isset($employees_types->description)? $employees_types->description: old('description') }}" rows="6" id="editor1" class="form-control" placeholder="Descrição do Tipo de Funcionario">
            {{ isset($employees_types->description) ? $employees_types->description : old('description') }}
        </textarea>
    </div>
</div>
