<template>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 align-self-center">
            <form>
                <p>
                    Nombre: <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                </p>
                <p>
                    Descripción: <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control" placeholder="Descripción del evento"></textarea>
                </p>
                <div class="col-md-10" style="text-align-center">
                    <table class="tablas table-striped mt-2 text-center align-items-center" style="overflow-x:auto; margin: 0 auto;">
                        <thead>
                            <tr>
                                <th scope="col">Dia</th>
                                <th scope="col">Si/No</th>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">Lunes</td>
                                <td scope="col">
                                    <a>
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="flexSwitchCheckDefault"
                                        />
                                    </a>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Martes</td>
                                <td scope="col">
                                    <a>
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="flexSwitchCheckDefault"
                                        />
                                    </a>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select" 
                                    aria-label="Default select example"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Miercoles</td>
                                <td scope="col">
                                    <a>
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="flexSwitchCheckDefault"
                                        />
                                    </a>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Jueves</td>
                                <td scope="col">
                                    <a>
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="flexSwitchCheckDefault"
                                        />
                                    </a>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Viernes</td>
                                <td scope="col">
                                    <a>
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="flexSwitchCheckDefault"
                                        />
                                    </a>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                                <td scope="col">
                                    <select
                                    name="horaInicio"
                                    class="form-select"
                                    >
                                        <option
                                            v-for="(hora, id) in horasDia"
                                            :value="hora"
                                            :key="id"
                                        >
                                            {{ hora }}
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
                <a class="button button1" href="">Crear</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {},
    data() {
        return {
            diasSemana: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"],

            horasDia: ["9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00"],
        };
    },
    mounted() {},
};
</script>
