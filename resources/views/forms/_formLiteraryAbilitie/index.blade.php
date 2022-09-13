<div class="col-md-12">
    <div class="form-group">
        <label for="Nome da Habilitação  Literaria">Habilitação  Literaria</label>
        <input  name="name"
            placeholder=" Habilitação Literaria" value="{{ isset($literary_abilities->name)? $literary_abilities->name: old('name') }}" type="text" class="form-control" id="validationCustom001" required>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="Descrição">Descrição</label>
        <textarea name="description"  value="{{ isset($literary_abilities->description)? $literary_abilities->description: old('description') }}" rows="6" id="editor1" class="form-control" placeholder="Descrição da habilitação Literaria">
        </textarea>
    </div>
</div>
</div>
