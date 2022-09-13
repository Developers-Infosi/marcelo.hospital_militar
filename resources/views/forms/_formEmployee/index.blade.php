
            <!-- Body Content Wrapper -->
            <div class="ms-content-wrapper">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel">
                            <div class="ms-panel-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">Nome</label>
                                            <div class="input-group">
                                                <input value="{{ isset($employee->name) ? $employee->name : old('name') }} "   type="text" name="name" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom003">Pai</label>
                                            <div class="input-group">
                                                <input value="{{ isset($employee->father) ? $employee->father : old('father') }}"   type="text" name="father" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">Mãe</label>
                                            <div class="input-group">
                                                <input  value="{{ isset($employee->mother) ? $employee->mother : old('mother') }}" type="text" name="mother" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom003">Data de Nascimento</label>
                                            <div class="input-group">
                                                <input   value="{{ isset($employee->birthDate) ? $employee->birthDate : old('birthDate') }}" type="date" name="birthDate" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">B.I/Passaporte</label>
                                            <div class="input-group">
                                                <input   value="{{ isset($employee->bi) ? $employee->bi : old('bi') }}"  maxlength="14" type="text" name="bi" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom003">Contactos</label>
                                            <div class="input-group">
                                                <input value="{{ isset($employee->tel) ? $employee->tel : old('tel') }}" maxlength="9" type="text" name="tel" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">E-mail</label>
                                            <div class="input-group">
                                                <input  value="{{ isset($employee->email) ? $employee->email : old('email') }}" type="text" name="email" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom003">
                                            Endereço</label>
                                            <div class="input-group">
                                                <input  value="{{ isset($employee->address) ? $employee->address : old('address') }}"  type="text" name="address" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">Nip</label>
                                            <div class="input-group">
                                                <input   value="{{ isset($employee->nip) ? $employee->nip : old('nip') }}" type="text" name="nip" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom003">Data do Contrato</label>
                                            <div class="input-group">
                                                <input value="{{ isset($employee->contratDate) ? $employee->contratDate : old('contratDate') }}" type="date" name="contratDate" class="form-control" id="validationCustom2" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">Departamentos</label>
                                            <select id="sub_category" name="fk_departments_id" class="form-control ">

                                                @if (isset($employee->departaments))
                                                <option selected value="{{ $employee->departaments->id }}">{{ $employee->departaments->name  }}
                                                </option>

                                                @endif

                                                @foreach ($departments as $item )
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom2">Cargo</label>
                                            <select name="fk_positions_id" class="form-control" aria-label="Default select example">
                                                @if (isset($employee->positions))
                                                <option selected value="{{ $employee->positions->id }}">{{ $employee->positions->name  }}
                                                </option>

                                                @endif
                                                <option disabled>Cargo</option>

                                                @foreach ($positions as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">Tipo de Contrato </label>
                                            <select required name="typeContract" class="form-control">

                                                @if (isset($employee))
                                                <option selected value="{{ $employee->typeContract }}">{{ $employee->typeContract  }}
                                                </option>

                                                @endif
                                                <option disabled >Escolha um Tipo de Contrato</option>
                                                <option value="Indeterminado ">Indeterminado</option>
                                                <option value="Determinado">Determinado</option>
                                           </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom2">Tipo de Funcionário</label>
                                            <select name="employeeType" class="form-control">
                                                @if (isset($employee))
                                                <option selected value="{{ $employee->employeeType }}">{{ $employee->employeeType  }}
                                                </option>

                                                @endif
                                                <option disabled >Escolha um Tipo de Funcionário</option>
                                                <option value="Efetivo">Efetivo </option>
                                                <option value="Eventuai">Eventuais</option>
                                           </select>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom2">Habilitacão Literária </label>
                                            <select name="literaryQualification" class="form-control">


                                                @if (isset($employee))
                                                <option selected value="{{ $employee->literaryQualification }}">{{ $employee->literaryQualification  }}
                                                </option>

                                                @endif

                                                <option value="Médio">Médio</option>
                                                <option value="">Escolha um Habilitacão Literária</option>
                                           </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="validationCustom003">Carregar Ficheiro do Contrato</label>
                                            <div class="input-group">
                                                <input type="file" name="ContractFile" class="form-control"  required>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Cadastrar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
