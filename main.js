const BtnMostrar = document.querySelector('.mostrar');

function BuscarCad(texto, subt, num){
	var i, x, n;
	n = num || 0;
	for (x=n; x <= texto.length - subt.length; x++){
		i=0;
		while(i < subt.length && texto[x+i] == subt[i])
			i++;
		if(i==subt.length)
			return x;
	}
	return -1;
}

function Filtrar(){
	var Vs, Vm, Vp, p, s, i, ks=0, ki=0, Tx="", padre;
	document.getElementById('schpro').value = "";
	Vs=document.querySelectorAll('#iconos select');
	for(s=0; s<Vs.length; s++)
		if(Vs[s].selectedIndex!=0)
			ks++;
	Vm= document.querySelectorAll('.marpro');
	Vp = document.querySelectorAll('.productos-img p');
	ki = Vp.length / Vm.length;
	for (p=0; p<Vp.length; p+=ki){
		ka=0;
		for(s=0;s<Vs.length; s++){
			i=Vs[s].selectedIndex;
			if(i != 0){
				if(Vp[p+s+1].innerHTML == Vs[s].options[i].text){
					ka++;
					Tx += p + ": "+ Vp[p+s+1].innerHTML + " - " + Vs[s].options[i].text + " ";
				}
			}
		}
		padre = Vp[p].parentNode;
		if(ka==ks)
			padre.style.display = "inline-block";
		else
			padre.style.display = "none";
		Tx += " " + "ka: " + ka + "\n";
	}
}

function ClearFil(){
	var Vsel, k;
	Vsel = document.querySelectorAll('#iconos select');
	for(k=0; k<Vsel.length; k++)
		Vsel[k].selectedIndex = 0;
	Filtrar();
}

function WinOpen(archivo){
	window.open(archivo, 'Agregar Tipo Cliente', 'width=700, height=600');
}

function WinOpen2(archivo){
	window.open(archivo, 'Producto', 'width=1300, height=700');
}

function Mostrar_Carrito(){
	for (let el of document.querySelectorAll('.vlr_venta')) el.style.visibility = 'hidden';
	for (let el of document.querySelectorAll('.Aparecer_Carrito')) el.style.visibility = 'visible';
}

function Ocultar_Carrito(){
	for (let el of document.querySelectorAll('.vlr_venta')) el.style.visibility = 'visible';
	for (let el of document.querySelectorAll('.Aparecer_Carrito')) el.style.visibility = 'hidden';


}

function Mostrar_Usuario(){
	document.getElementById('Ingresar').style.display='block';
	document.getElementById('Ingresar').style.cursor='auto';
}

function Ocultar_usuario(){
	document.getElementById('Ingresar').style.display='none';
	document.getElementById('Ingresar').style.cursor='pointer';
}

function BuscarPro(){
	var Schp, vp, k, ti, pr, padre;
	Schp = document.getElementById('schpro');
	vp = document.querySelectorAll('.productos-img p');
	for (k=0; k<vp.length; k+=2) {

		ti = BuscarCad(vp[k].innerHTML, Schp.value);
		pr = BuscarCad(vp[k+1].innerHTML, Schp.value);
		padre = vp[k].parentNode;
		if(ti == -1 && pr == -1)
			padre.style.display = "none";
		else 
			padre.style.display = "inline-block";
	}
}

function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==13) 
  	BuscarPro();
}

BtnMostrar.addEventListener('click', function(){
	console.log('click')
	document.getElementById('barra').classList.toggle('activar');
	//document.getElementById('principal').classList.toggle('mover');
	console.log(document.getElementById('barra'))
});

/*class CampoNumerico {

  constructor(selector) {
    this.nodo = document.querySelector(selector);
    this.valor = '';
    
    this.empezarAEscucharEventos();
  }
  
  empezarAEscucharEventos() {
    this.nodo.addEventListener('keydown', function(evento) {
      const teclaPresionada = evento.key;
      const teclaPresionadaEsUnNumero =
        Number.isInteger(parseInt(teclaPresionada));

      const sePresionoUnaTeclaNoAdmitida = 
        teclaPresionada != 'ArrowDown' &&
        teclaPresionada != 'ArrowUp' &&
        teclaPresionada != 'ArrowLeft' &&
        teclaPresionada != 'ArrowRight' &&
        teclaPresionada != 'Backspace' &&
        teclaPresionada != 'Delete' &&
        teclaPresionada != 'Enter' &&
        !teclaPresionadaEsUnNumero;
      const comienzaPorCero = 
        this.nodo.value.length === 0 &&
        teclaPresionada == 0;

      if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
        evento.preventDefault(); 
      } else if (teclaPresionadaEsUnNumero) {
        this.valor += String(teclaPresionada);
      }

    }.bind(this));

    this.nodo.addEventListener('input', function(evento) {
      const cumpleFormatoEsperado = new RegExp(/^[0-9]+/).test(this.nodo.value);

      if (!cumpleFormatoEsperado) {
        this.nodo.value = this.valor;
      } else {
        this.valor = this.nodo.value;
      }
    }.bind(this));
  }

}
new CampoNumerico('#numero');
new CampoNumerico('#garantia');

var number = document.getElementById('numero'); 
numInput. number.onkeydown = function(e) { 
	if(!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) || e.keyCode == 8)) 
		{ return false; 
		} 
	}
var number = document.getElementById('garantia'); 
numInput. number.onkeydown = function(e) { 
	if(!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) || e.keyCode == 8)) 
		{ return false; 
		} 
	}*/
