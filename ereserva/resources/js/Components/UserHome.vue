<template>
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-auto col-8">
            <form @submit.prevent="reservar(id_evento)">
                <h4>Dia que desea reservar:</h4>
                <select
                    name="dia"
                    class="form-select form-control mb-2"
                    v-model="dia_reserva"
                    
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
                    name="hora"
                    class="form-select form-control mb-2"
                    v-model="hora_reserva"
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
                    name="nombre"
                    type="text"
                    class="form-control mb-2"
                    placeholder="Nombre"
                    v-model="nombre_solicitante"
                />
                <h4>Apellido del solicitante:</h4>
                <input
                    name="apellido"
                    type="text"
                    class="form-control mb-2"
                    placeholder="Apellido"
                    v-model="apellido_solicitante"
                />
                <h4>Correo electronico:</h4>
                <input
                    name="email"
                    type="text"
                    class="form-control mb-2"
                    placeholder="Email"
                    v-model="email"
                />
                <h4>Número Teléfonico:</h4>
                <input
                    name="telefono"
                    type="text"
                    class="form-control mb-2"
                    placeholder="No. Teléfono"
                    v-model="numero_telefono"
                />
                <button class="btn btn-primary" type="submit" @click="reservar">Reservar</button>
            </form>
        </div>
    </div>
</template>
<script>
// import Swal from "sweetalert2";

export default {
    
    props: {
        array_dias: "",
        array_horas: "",
        id_evento: "",
    },
     
    data() {
        return {
            dia_reserva:"",
            hora_reserva:"",
            nombre_solicitante:"",
            apellido_solicitante:"",
            email:"",
            numero_telefono:"",
            
        };
    },
    created() {},
    methods: {
        reservar(id_evento) {
            let data = new FormData();
            data.append("dia_reserva",this.dia_reserva);
            data.append("hora_reserva",this.hora_reserva);
            data.append("nombre_solicitante",this.nombre_solicitante);
            data.append("apellido_solicitante",this.apellido_solicitante);
            data.append("email",this.email);
            data.append("numero_telefono",this.numero_telefono);
            data.append("id_evento", this.id_evento);
            axios
                .post("/reservas", data)
                .then((res) => {
                    console.log(res.data);
                })
                .catch(function (error) {
                    console.log(error.response.data);
                    console.log(data);
                });
        },
    },
    computed: {},
};
</script>
