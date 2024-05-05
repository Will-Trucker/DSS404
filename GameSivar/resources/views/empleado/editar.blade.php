<form action="{{ route('empleado.actualizar', $empleado->idEmpleado) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Nombre:</span>
        </div>
        <input type="text" name="nombre" value="{{ $empleado->Nombre }}" class="input input-bordered w-full max-w-xs" required/>
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Apellido:</span>
        </div>
        <input type="text" name="apellido" value="{{ $empleado->Apellido }}" class="input input-bordered w-full max-w-xs" required/>
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Fecha de contratación:</span>
        </div>
        <input type="date" name="fecha_contratacion" value="{{ $empleado->FechaContratacion }}" required />
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Fecha de Nacimiento:</span>
        </div>
        <input type="date" name="fecha_nacimiento" value="{{ $empleado->FechaNacimiento }}" required />
    </label>

    <label class="form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text">Teléfono:</span>
        </div>
        <input type="text" name="telefono" value="{{ $empleado->Telefono }}" class="input input-bordered w-full max-w-xs" required />
    </label>

    <input type="submit" class="btn" value="Actualizar">
</form>
