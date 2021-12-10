export interface Mascota {
    id?:number;
    nombre_mascota:string;
    veterinario_id?: number;
    raza: string;
    tipo: string;
    sexo: string;
    tamano: string;
    edad: number;
    tipo_servicio: string;
    valor_servicio: number;
    nombre_cliente: string;
    identificacion_cliente: string;
    telefono: string;
    direccion: string;
}  