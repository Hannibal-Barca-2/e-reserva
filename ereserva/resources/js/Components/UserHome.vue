<template>
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-auto col-8">
            <form @submit.prevent="validarFormulario()">
                <h4>Dia que desea reservar:</h4>

                <div class="alert alert-danger" v-if="errores && errores.dia_reserva">
                    {{ errores.dia_reserva[0] }}
                </div>
                
                <v-date-picker 
                :value="null"
                :attributes='attributes'
                :masks="masks"
                mode="date"
                v-model="dia_reserva"
                @dayclick="consultarHoras"
                is-inline/>

                <h4>Hora que desea reservar:</h4>
                <div class="alert alert-danger" v-if="errores && errores.hora_reserva">
                    {{ errores.hora_reserva[0] }}
                </div>
                <select
                    name="hora"
                    class="form-select form-control mb-2"
                    v-model="hora_reserva"
                >
                    <option
                        v-for="(hora, id) in horasDisponibles"
                        :value="hora"
                        :key="id"
                    >
                        {{ hora }}
                    </option>
                </select>

                <h4>Nombre(s) del Solicitante:</h4>
                <div class="alert alert-danger" v-if="errores && errores.nombre_solicitante">
                    {{ errores.nombre_solicitante[0] }}
                </div>
                <input
                    name="nombre"
                    type="text"
                    autocomplete="off"
                    class="form-control mb-2"
                    placeholder="Nombre"
                    v-model="nombre_solicitante"
                />
                
                <h4>Apellido(s) del solicitante:</h4>
                <div class="alert alert-danger" v-if="errores && errores.apellido_solicitante">
                    {{ errores.apellido_solicitante[0] }}
                </div>
                <input
                    name="apellido"
                    type="text"
                    autocomplete="off"
                    class="form-control mb-2"
                    placeholder="Apellido"
                    v-model="apellido_solicitante"
                />
                <h4>Correo electronico:</h4>
                <div class="alert alert-danger" v-if="errores && errores.email">
                    {{ errores.email[0] }}
                </div>
                <input
                    name="email"
                    type="text"
                    autocomplete="off"
                    class="form-control mb-2"
                    placeholder="Email"
                    v-model="email"
                />
                <h4>Número Teléfonico:</h4>
                <div class="alert alert-danger" v-if="errores && errores.numero_telefono">
                    {{ errores.numero_telefono[0] }}
                </div>
                <input
                    name="telefono"
                    type="number"
                    pattern="{10}"
                    title="El numero teléfonico debe contener 10 digitos"
                    autocomplete="off"
                    class="form-control mb-2"
                    placeholder="No. Teléfono"
                    v-model="numero_telefono"
                />
                <p v-if="errores.length">
                    <b>
                    Por favor revise los siguientes errores:
                    </b>
                    <ul>
                        <li v-for="error in errores">
                         {{error}}
                        </li>
                    </ul>
                </p>
                <button class="btn btn-primary" type="submit" @click="reservar()">Reservar</button>
            </form>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";
import { FunctionalCalendar } from 'vue-functional-calendar';
import VCalendar from 'v-calendar';
import { Calendar, DatePicker } from 'v-calendar';

Vue.use(VCalendar, {
  componentPrefix: 'vc',  // Use <vc-calendar /> instead of <v-calendar />
    screens: {
    tablet: '576px',
    laptop: '992px',
    desktop: '1200px',
    },   
    // ...other defaults
});

export default {
    props: {
        array_dias: "",
        array_horas: "",
        id_evento: "",
    },
    
    components: {
        Calendar,
        DatePicker,
    },

    mounted(){
        console.log(this.array_dias[1]);
    },

    data() {
        return {
            errores: {},
            dia_reserva: "",
            hora_reserva: "",
            nombre_solicitante: "",
            apellido_solicitante: "",
            email: "",
            numero_telefono: "",
            evento: this.id_evento,

            arr_dias: this.array_dias,
            horasDisponibles: "",

            disabledDates: {
                to: new Date(Date.now() - 8640000)
            },

            masks:{
                input: 'YYYY-MM-DD',
            },

            attributes: [
                {
                dates: '2022-08-15',
                dots: true,
                }
            ],

        };
    },
    
    methods: {
        reservar() {
            let data = new FormData();
            data.append("dia_reserva", this.dia_reserva);
            data.append("hora_reserva", this.hora_reserva);
            data.append("nombre_solicitante", this.nombre_solicitante);
            data.append("apellido_solicitante", this.apellido_solicitante);
            data.append("email", this.email);
            data.append("numero_telefono", this.numero_telefono);
            data.append("id_evento", this.evento);

            axios
                .post("/reservas", data)
                .then((res) => {
                    Swal.fire({
                        title: "Se ha enviado tu solicitud",
                        text: "Pronto nos contactaremos contigo",
                        icon: "success",
                        howClass: {
                            popup: "animate__animated animate__fadeInDown",
                        },
                        hideClass: {
                            popup: "animate__animated animate__fadeOutUp",
                        },
                    }).then(function () {
                        location.reload();
                    });
                })
                .catch(error => {
                    if(error.response.status == 422){
                        this.errores = error.response.data.errors;
                    }
                    console.log(this.errores);
                });
        },

        validarFormulario: function(e) {
            if(this.hora_reserva
            &&this.dia_reserva 
            &&this.nombre_solicitante 
            &&this.apellido_solicitante 
            &&this.numero_telefono 
            &&this.email){
                return true;
            }

            this.errores = [];

            if(!this.hora_reserva){
             this.errores.push('La hora es obligatoria');   
            }
            if(!this.dia_reserva){
             this.errores.push('El dia es obligatorio');   
            }
            if(!this.nombre_solicitante){
             this.errores.push('El nombre es obligatorio');   
            }else if((this.nombre_solicitante.length)<=2){
                console.log(this.nombre_solicitante.length);
                this.errores.push('El nombre no es valido');
            }

            if(!this.apellido_solicitante){
             this.errores.push('El apellido es obligatorio');   
            }else if(this.apellido_solicitante.length<=2){
                console.log(this.apellido_solicitante.length);
                this.errores.push('El apellido no es valido');
            }

            if(!this.numero_telefono){
             this.errores.push('El número es obligatorio');   
            }else if((this.numero_telefono.length)<=9){
                console.log(this.numero_telefono);
                this.errores.push('El numero de teléfono debe tener 10 digitos');
            }

            if(!this.email){
             this.errores.push('El correo es obligatorio');   
            }else if(!this.validEmail(this.email)){
                this.errores.push('El correo electrónico debe ser válido.');
            }

            e.preventDefault();
        },
        
        consultarHoras() {
            let data = new FormData();
            data.append("dia_reserva", this.dia_reserva);
            data.append("id_evento", this.evento);

            axios
                .post("/traer_horas", data)
                .then((res) => {
                    this.horasDisponibles = res.data;
                    console.log(res);
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
        },
    },
    computed: {},
};
</script>