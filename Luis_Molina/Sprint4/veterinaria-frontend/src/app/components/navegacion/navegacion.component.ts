import { Component, OnInit } from '@angular/core';
@Component({
  selector: 'app-navegacion',
  templateUrl: './navegacion.component.html',
  styleUrls: ['./navegacion.component.css']
})
export class NavegacionComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  openDropdownContacto() {
    document.getElementById("dropdownContacto")!.classList.toggle("show");
  }

  openDropdownRegistrar() {
    document.getElementById("dropdownRegistrar")!.classList.toggle("show");
  }

  openDropdownUsuario() {
    document.getElementById("dropdownUsuario")!.classList.toggle("show");
  }

}
