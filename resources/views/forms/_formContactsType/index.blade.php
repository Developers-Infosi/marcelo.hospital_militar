<div class="col-md-12">
    <div class="form-group">
        <label for="Nome da Contrato">Tipo de Contrato</label>
        <input  name="name"
            placeholder="Tipo de Contrato" value="{{ isset($contracts_types->name)? $contracts_types->name: old('name') }}" type="text" class="form-control" id="validationCustom001" required>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="Descrição">Descrição</label>
        <textarea name="description"  value="{{ isset($contracts_types->description)? $contracts_types->description: old('description') }}" rows="6" id="editor1" class="form-control" placeholder="Descrição do tipo de Funcionario">
        </textarea>
    </div>
</div>
</div>
