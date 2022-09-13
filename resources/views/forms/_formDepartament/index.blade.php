<div class="col-md-12">
    <div class="form-group">
        <label for="Nome da Consulta">Nome do Departamento</label>
        <input  name="name"
            placeholder="Nome do Departamento" value="{{ isset($departments->name)? $departments->name: old('name') }}" type="text" class="form-control" id="validationCustom001" required>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="Descrição">Descrição</label>
        <textarea name="description"  value="{{ isset($departments->description)? $departments->description: old('description') }}" rows="6" id="editor1" class="form-control" placeholder="Descrição do Departamento">
            {{ isset($departments->description) ? $departments->description : old('description') }}

        </textarea>
    </div>
</div>

