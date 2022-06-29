<template>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 align-self-center">
            <form>
                <p>
                    Nombre:
                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre"
                        class="form-control"
                    />
                </p>
                <p>
                    Descripción:
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        cols="30"
                        rows="3"
                        class="form-control"
                        placeholder="Descripción del evento"
                    ></textarea>
                </p>
            </form>
            <a class="button button1" type="submit" href="{{ route('horarios.crear') }}">Siguiente</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {},
    data() {
        return {
            diasSemana: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"],

            horasDia: [
                "9:00",
                "10:00",
                "11:00",
                "12:00",
                "13:00",
                "14:00",
                "15:00",
                "16:00",
                "17:00",
                "18:00",
            ],
        };
    },
    mounted() {},
};
</script>
