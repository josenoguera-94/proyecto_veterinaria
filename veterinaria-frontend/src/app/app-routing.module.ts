import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from '../app/components/login/login.component'
import { ListarMascotasComponent } from './components/mascotas/listar-mascotas/listar-mascotas.component';
import { EditarMascotaComponent } from './components/mascotas/editar-mascota/editar-mascota.component';
import { CrearUsuarioComponent } from './components/crear-usuario/crear-usuario.component';

const routes: Routes = [
  {
    path: '',
    component: LoginComponent
  },
  {
    path: 'inicio', 
    component: ListarMascotasComponent
  },
  {
    path: 'mascotas', 
    component: ListarMascotasComponent
  },
  {
    path: 'registrar_mascota', 
    component: EditarMascotaComponent
  },
  {
    path: 'editar_mascota', 
    component: EditarMascotaComponent
  },
  {
    path: 'registro_usuario', 
    component: CrearUsuarioComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
