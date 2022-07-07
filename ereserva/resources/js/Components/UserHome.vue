<template>
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-auto col-8">
            <form @submit="reservar()">
                <h4>Dia que desea reservar:</h4>
                <select
                    name="dia"
                    class="form-select form-control mb-2"
                >
                    <option
                        v-for="(dia, id) in array_dias"
                        :value="dia"
                        :key="id"
                    >
                        {{ dia }}
                    </option>
                </select>

                <h4>Hora que desea reservar:</h4>
                <select
                    name="hora-"
                    class="form-select form-control mb-2"
                >
                    <option
                        v-for="(hora, id) in array_horas"
                        :value="hora"
                        :key="id"
                    >
                        {{hora}}
                    </option>
                </select>

                <h4>Nombre del Solicitante:</h4>
                <input
                    class="nombre"
                    type="text"
                    class="form-control mb-2"
                    placeholder="Nombre"
                />
                <h4>Apellido del solicitante:</h4>
                <input
                    class="apellido"
                    type="text"
                    class="form-control mb-2"
                    placeholder="Apellido"
                />
                <h4>Correo electronico:</h4>
                <input
                    name="email"
                    type="text"
                    class="form-control mb-2"
                    placeholder="Email"

                />
                <h4>Número Teléfonico:</h4>
                <input
                    name="telefono"
                    type="text"
                    class="form-control mb-2"
                    placeholder="No. Teléfono"
                />
                <button class="btn btn-primary" type="submit">Reservar</button>
            </form>
        </div>
    </div>
</template>
<script>
// import Swal from "sweetalert2";

export default {
    
    props: {
        array_dias: "",
        array_horas: ""
    },
     
    data() {
        return {
            
        };
    },
    created() {},
    methods: {
        reservar() {
            let data = new FormData();
        },
    },
    computed: {},
};
</script>
