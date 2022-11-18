#include <stdio.h>
int main();
int retorno(){
	int valor;
	printf("\n\nDeseja fazer mais alguma conversao? se sim digite 1:");
	scanf("%i", &valor);
		if (valor == 1){
			main();}
		else{
		printf("\n\nObrigado por usar nosso software");}		
}
int menuMatematica(){
	int Resposta;
	
	printf( "\n>>>> Funcoes MATEMATICOS <<<<\n" );
	printf("\n  01)  Fatorial");
	printf("\n  02)  Exponecial");
	printf("\n  03)  Sequencia de fibonacci");
	printf("\n  04)  Somatorio de Sequencia");
	printf("\n  05)   Media Aritmetica");
	printf("\n  06)  Matematica");
	printf("\n  07) sair");

	printf("\n\nDigite a opcao desejada: ");
	scanf("%i", &Resposta);
	return(Resposta);	
}
 	
int menumas(){
	int Resposta;
	
	printf( "\n>>>> CONVERSOR DE MASSAS <<<<\n" );
	printf("\n  01) Tonelada para Grama");
	printf("\n  02) Tonelada para Quilograma");
	printf("\n  03) Tonelada para Miligrama");
	printf("\n  04) Quilograma para Tonelada");
	printf("\n  05) Quilograma para Grama");
	printf("\n  06) Quilograma para Miligrama");
	printf("\n  07) Grama para Tonelada");
	printf("\n  08) Grama para Quilograma");
	printf("\n  09) Grama para Miligrama");
	printf("\n  10) Miligrama para Tonelada");
	printf("\n  11) Miligrama para Quilograma");
	printf("\n  12) Miligrama para Grama");
	printf("\n  13) Voltar ao menu principal");
	printf("\n  14) Sair");
	
	printf("\n\nDigite a opcao desejada: ");
	scanf("%i", &Resposta);
	return(Resposta);	
}
float TparaG(){
	float resultado;
	printf("Digite a massa em tonelada: ");
	scanf("%f", &resultado);
	printf("\n Valor em grama: %f", resultado*1000000);
	retorno();
}
float TparaKG(){
	float resultado;
	printf("Digite a massa em tonelada: ");
	scanf("%f", &resultado);
	printf("\n Valor em quilograma: %f", resultado*1000);
	retorno();
}
float TparaMG(){
	float resultado;
	printf("Digite a massa em tonelada: ");
	scanf("%f", &resultado);
	printf("\n Valor em miligrama: %f", resultado*1000000000);
	retorno();
}
float KGparaT(){
	float resultado;
	printf("Digite a massa em quilograma: ");
	scanf("%f", &resultado);
	printf("\n Valor em tonelada: %f", resultado/1000);
	retorno();
}
float KGparaG(){
	float resultado;
	printf("Digite a massa em quilograma: ");
	scanf("%f", &resultado);
	printf("\n Valor em grama: %f", resultado*1000);
	retorno();
}
float KGparaMG(){
	float resultado;
	printf("Digite a massa em quilograma: ");
	scanf("%f", &resultado);
	printf("\n Valor em miligrama: %f", resultado*1000000);
	retorno();
}
float GparaT(){
	float resultado;
	printf("Digite a massa em grama: ");
	scanf("%f", &resultado);
	printf("\n Valor em tonelada: %f", resultado/1000000);
	retorno();
}
float GparaKG(){
	float resultado;
	printf("Digite a massa em grama: ");
	scanf("%f", &resultado);
	printf("\n Valor em quilograma: %f", resultado/1000);
	retorno();
}
float GparaMG(){
	float resultado;
	printf("Digite a massa em grama: ");
	scanf("%f", &resultado);
	printf("\n Valor em miligrama: %f", resultado*1000);
	retorno();
}
float MGparaT(){
	float resultado;
	printf("Digite a massa em miligrama: ");
	scanf("%f", &resultado);
	printf("\n Valor em tonelada: %f", resultado/1000000000);
	retorno();
}
float MGparaKG(){
	float resultado;
	printf("Digite a massa em miligrama: ");
	scanf("%f", &resultado);
	printf("\n Valor em quilograma: %f", resultado/1000000);
	retorno();
}
float MGparaG(){
	float resultado;
	printf("Digite a massa em miligrama: ");
	scanf("%f", &resultado);
	printf("\n Valor em grama: %f", resultado/1000);
	retorno();
}
int conmas(){
	int opcao = menumas();
			
	switch (opcao){
		case 1:{
			TparaG();
			break;}
		case 2:{
			TparaKG();
			break;}
		case 3:{
			TparaMG();
			break;}
		case 4:{
			KGparaT();
			break;}
		case 5:{
			KGparaG();
			break;}
		case 6:{
			KGparaMG();
			break;}
		case 7:{
			GparaT();
			break;}
		case 8:{
			GparaKG();
			break;}
		case 9:{
			GparaMG();
			break;}
		case 10:{
			MGparaT();
			break;}
		case 11:{
			MGparaKG();
			break;}
		case 12:{
			MGparaG();
			break;}
		case 13:{
			main();
			break;}	
		case 14:{
			printf("Obrigado por usar nosso software");
			break;}	
		default:{
			printf("\n\nEscolha uma opcao valida!!!!\n\n");
			conmas();
			break;}			
	}	
}
int menutem(){
	
	int resposta;
	printf("\n>>>> CONVERSOR DE TEMPERATURA <<<<\n");
	printf("\n  1) Celsius para Farenheit");
	printf("\n  2) Farenheit para Celsius");
	printf("\n  3) Celsius para Kelvin");
	printf("\n  4) Kelvin para Celsius");
	printf("\n  5) Kelvin para Farenheit");
	printf("\n  6) Farenheit para Kelvin");
	printf("\n  7) Voltar ao menu principal");
	printf("\n  8) sair");
	
	printf("\n\nDigite a opcao desejada: ");
	scanf("%i", &resposta);
	return(resposta);
}
float CparaF (){
	float temperatura;
	printf("Digite a temperatura em Celsius: ");
	scanf("%f", &temperatura);
	printf("A temperatura convertida para Farenheit e: %.1f",temperatura * 1.8 + 32);
	retorno();
} 
float FparaC (){
	float temperatura;
	printf("Digite a temperatura em Farenheit: ");
	scanf("%f", &temperatura);
	printf("A temperatura convertida para Celsius e: %.1f",(temperatura - 32) / 1.8);
	retorno();	
}
float CparaK (){
	float temperatura;
	printf("Digite a temperatura em Celsius: ");
	scanf("%f", &temperatura);
	printf("A temperatura convertida para Kelvin e: %.1f",temperatura + 273);	
	retorno();
}
float KparaC (){
	float temperatura;
	printf("Digite a temperatura em Kelvin: ");
	scanf("%f", &temperatura);
	printf("A temperatura convertida para Celsius e: %.1f",temperatura - 273);
	retorno();
}
float KparaF (){
	float temperatura;
	printf("Digite a temperatura em Kelvin: ");
	scanf("%f", &temperatura);
	printf("A temperatura convertida para Farenheit e: %.1f",1.8 * (temperatura - 273) + 32);
	retorno();
}
float FparaK (){
	float temperatura;
	printf("Digite a temperatura em Farenheit: ");
	scanf("%f", &temperatura);
	printf("A temperatura convertida para Kelvin e: %.1f",(temperatura + 459.67) * 0.555);
	retorno();
}
int contem(){	
	int opcao = menutem ();

	switch(opcao){
		case 1: {
			CparaF();
			break;}
		case 2: {
			FparaC();
			break;}
		case 3: {
			CparaK();
			break;}
		case 4: {
			KparaC();
			break;}
		case 5: {
			KparaF();
			break;}
		case 6: {
			FparaK();
			break;}
		case 7:{
			main();
			break;}	
		case 8:{
			printf("Obrigado por usar nosso software");
			break;}
		default:{
			printf("\n\nEscolha uma opcao valida!!!!\n\n");
			contem();
			break;}	
	}
}
int menufre(){
	int Resposta;
	
	printf( "\n>>>> CONVERSOR DE FREQUENCIAS <<<<\n" );
	printf("\n  01) Hertz para QuiloHertz");
	printf("\n  02) Hertz para MegaHertz");
	printf("\n  03) Hertz para GigaHertz");
	printf("\n  04) QuiloHertz para Hertz");
	printf("\n  05) QuiloHertz para MegaHertz");
	printf("\n  06) QuiloHertz para GigaHertz");
	printf("\n  07) MegaHertz para Hertz");
	printf("\n  08) MegaHertz para QuiloHertz");
	printf("\n  09) MegaHertz para GigaHertz");
	printf("\n  10) GigaHertz para Hertz");
	printf("\n  11) GigaHertz para QuiloHertz");
	printf("\n  12) GigaHertz para MegaHertz");
	printf("\n  13) Voltar ao menu principal");
	printf("\n  14) Sair");
	
	printf("\n\nDigite a opcao desejada: ");
	scanf("%i", &Resposta);
	return(Resposta);	
}
float HzParaKHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em KHz: %f", resultado/1000);
	retorno();
}
float HzParaMHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em MHz: %f", resultado/1000000);
	retorno();
}
float HzParaGHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em GHz: %f", resultado/1000000000);
	retorno();
}
float KHzParaHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em Hz: %f", resultado*1000);
	retorno();
}
float KHzParaMHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em MHz: %f", resultado/1000);
	retorno();
}
float KHzParaGHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em GHz: %f", resultado/1000000);
	retorno();
}
float MHzParaHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em Hz: %f", resultado*1000000);
	retorno();
}
float MHzParaKHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em KHz: %f", resultado*1000);
	retorno();
}
float MHzParaGHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em GHz: %f", resultado/1000);
	retorno();
}
float GHzParaHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em Hz: %f", resultado*1000000000);
	retorno();
}
float GHzParaKHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em KHz: %f", resultado*1000000);
	retorno();
}
float GHzParaMHz(){
	float resultado;
	printf("Informe o valor da frequencia: ");
	scanf("%f", &resultado);
	printf("\n Valor em MHz: %f", resultado*1000);
	retorno();
}
int confre(){
	int opcao = menufre();
			
	switch (opcao){
		case 1:{
			HzParaKHz();
			break;}
		case 2:{
			HzParaMHz();
			break;}
		case 3:{
			HzParaGHz();
			break;}
		case 4:{
			KHzParaHz();
			break;}
		case 5:{
			KHzParaMHz();
			break;}
		case 6:{
			KHzParaGHz();
			break;}
		case 7:{
			MHzParaHz();
			break;}
		case 8:{
			MHzParaKHz();
			break;}
		case 9:{
			MHzParaGHz();
			break;}
		case 10:{
			GHzParaHz();
			break;}
		case 11:{
			GHzParaKHz();
			break;}
		case 12:{
			GHzParaMHz();
			break;}
		case 13:{
			main();
			break;}	
		case 14:{
			printf("Obrigado por usar nosso software");
			break;}
		default:{
			printf("\n\nEscolha uma opcao valida!!!!\n\n");
			confre();
			break;}				
	}	
}
int menuvol(){
	
	int resposta;
	printf("\n>>>> CONVERSOR DE VOLUMES <<<<\n");
	printf("\n  1) Metro cubico para Litro");
	printf("\n  2) Metro cubico para Mililitro");
	printf("\n  3) Litro para Metro cubico");
	printf("\n  4) Litro para Mililitro");
	printf("\n  5) Mililitro para Metro cubico");
	printf("\n  6) Mililitro para Litro");
	printf("\n  7) Voltar ao menu principal");
	printf("\n  8) sair");
	
	printf("\n\nDigite a opcao desejada: ");
	scanf("%i", &resposta);
	return(resposta);
}
float MCparaL (){
	float resultado;
	printf("Digite o volume em metro cubico: ");
	scanf("%f", &resultado);
	printf("\nO valor em litros e: %.2f", resultado *1000);
	retorno();
}
float MCparaML (){
	float resultado;
	printf("Digite o volume em metro cubico: ");
	scanf("%f", &resultado);
	printf("\nO valor em mililitros e: %.2f", resultado *1000000);
	retorno();
}
float LparaMC (){
	float resultado;
	printf("Digite o volume em litro: ");
	scanf("%f", &resultado);
	printf("\nO valor em metro cubico e: %.2f", resultado /1000);
	retorno();
} 
float LparaML (){
	float resultado;
	printf("Digite o volume em litro: ");
	scanf("%f", &resultado);
	printf("\nO valor em mililitro e: %.2f", resultado *1000);
	retorno();
}
float MLparaMC (){
	float resultado;
	printf("Digite o volume em mililitro: ");
	scanf("%f", &resultado);
	printf("\nO valor em metro cubico e: %.2f", resultado /1000000);
	retorno();
}
float MLparaL (){
	float resultado;
	printf("Digite o volume em mililitro: ");
	scanf("%f", &resultado);
	printf("\nO valor em litro e: %.2f", resultado /1000);
	retorno();
}
int convol(){
	int opcao = menuvol ();

	switch(opcao){
		case 1:{
			MCparaL();
			break;}
		case 2:{
			MCparaML();
			break;}
		case 3:{
			LparaMC();
			break;}
		case 4:{
			LparaML();
			break;}
		case 5:{
			MLparaMC();
			break;}
		case 6:{
			MLparaL();
			break;}
		case 7:{
			main();
			break;}	
		case 8:{
			printf("Obrigado por usar nosso software");
			break;}
		default:{
			printf("\n\nEscolha uma opcao valida!!!!\n\n");
			convol();
			break;}	
	}
}
int menucom(){
	int Resposta;
	
	printf( "\n>>>> CONVERSOR DE COMPRIMENTOS <<<<\n" );
	printf("\n  01) Quilometro para Metro");
	printf("\n  02) Quilometro para Centimetro");
	printf("\n  03) Quilometro para Milimetro");
	printf("\n  04) Metro para Quilometro");
	printf("\n  05) Metro para Centimetro");
	printf("\n  06) Metro para Milimetro");
	printf("\n  07) Centimetro para Quilometro");
	printf("\n  08) Centimetro para Metro");
	printf("\n  09) Centimetro para Mililitro");
	printf("\n  10) Mililitro para Quilometro");
	printf("\n  11) Mililitro para Metro");
	printf("\n  12) Mililitro para Centimetro");
	printf("\n  13) Voltar ao menu principal");
	printf("\n  14) Sair");
	
	printf("\n\nDigite a opcao desejada: ");
	scanf("%i", &Resposta);
	return(Resposta);	
}


int Fatorial_(int vlr){
	int resultado = 1;
	for (int i=2; i<=vlr; i++)
	  resultado *= i;
	  return(resultado);
}
  
 int fatorialRecursivo(int vlr){
 	if(vlr == 1)
 	return(vlr);
 	else
 	return(vlr*fatorialRecursivo (vlr-1));
 } 

float KMparaM(){
	float resultado;
	printf("Digite o comprimento em quilometro: ");
	scanf("%f", &resultado);
	printf("\n Valor em metro: %f", resultado*1000);
	retorno();
}
float KMparaCM(){
	float resultado;
	printf("Digite o comprimento em quilometro: ");
	scanf("%f", &resultado);
	printf("\n Valor em centimetro: %f", resultado*100000);
	retorno();
}
float KMparaMM(){
	float resultado;
	printf("Digite o comprimento em quilometro: ");
	scanf("%f", &resultado);
	printf("\n Valor em milimetro: %f", resultado*1000000);
	retorno();
}
float MparaKM(){
	float resultado;
	printf("Digite o comprimento em metro: ");
	scanf("%f", &resultado);
	printf("\n Valor em quilometro: %f", resultado/1000);
	retorno();
}
float MparaCM(){
	float resultado;
	printf("Digite o comprimento em metro: ");
	scanf("%f", &resultado);
	printf("\n Valor em centimetro: %f", resultado*100);
	retorno();
}
float MparaMM(){
	float resultado;
	printf("Digite o comprimento em metro: ");
	scanf("%f", &resultado);
	printf("\n Valor em milimetro: %f", resultado*1000);
	retorno();
}
float CMparaKM(){
	float resultado;
	printf("Digite o comprimento em centimetro: ");
	scanf("%f", &resultado);
	printf("\n Valor em quilometro: %f", resultado/100000);
	retorno();
}
float CMparaM(){
	float resultado;
	printf("Digite o comprimento em centimetro: ");
	scanf("%f", &resultado);
	printf("\n Valor em metro: %f", resultado/100);
	retorno();
}
float CMparaMM(){
	float resultado;
	printf("Digite o comprimento em centimetro: ");
	scanf("%f", &resultado);
	printf("\n Valor em milimetro: %f", resultado*10);
	retorno();
}
float MMparaKM(){
	float resultado;
	printf("Digite o comprimento em centimetro: ");
	scanf("%f", &resultado);
	printf("\n Valor em quilometro: %f", resultado/1000000);
	retorno();
}
float MMparaM(){
	float resultado;
	printf("Digite o comprimento em milimetro: ");
	scanf("%f", &resultado);
	printf("\n Valor em metro: %f", resultado/1000);
	retorno();
}
float MMparaCM(){
	float resultado;
	printf("Digite o comprimento em milimetro: ");
	scanf("%f", &resultado);
	printf("\n Valor em centimetro: %f", resultado/10);
	retorno();
}
int concom(){
	int opcao = menucom();
			
	switch (opcao){
		case 1:{
			KMparaM();
			break;}
		case 2:{
			KMparaCM();
			break;}
		case 3:{
			KMparaMM();
			break;}
		case 4:{
			MparaKM();
			break;}
		case 5:{
			MparaCM();
			break;}
		case 6:{
			MparaMM();
			break;}
		case 7:{
			CMparaKM();
			break;}
		case 8:{
			CMparaM();
			break;}
		case 9:{
			CMparaMM();
			break;}
		case 10:{
			MMparaKM();
			break;}
		case 11:{
			MMparaM();
			break;}
		case 12:{
			MMparaCM();
			break;}
		case 13:{
			main();
			break;}	
		case 14:{
			printf("Obrigado por usar nosso software");
			break;}
		default:{
			printf("\n\nEscolha uma opcao valida!!!!\n\n");
			concom();
			break;}				
	}	
}
int menuprincipal(){
	int Resposta;
	
	printf( "\n>>>> CALCULADORA DE CONVERSAO <<<<\n" );
	printf("\n  01) Massa");
	printf("\n  02) Temperatura");
	printf("\n  03) Frequencia");
	printf("\n  04) Volume");
	printf("\n  05) Comprimento");
	printf("\n  06) Sair");
	
	printf("\n\nDigite a opcao desejada: ");
	scanf("%i", &Resposta);
	return(Resposta);
}
int main(){
	int opcao = menuprincipal();
			
	switch (opcao){
		case 1:{
			conmas();
			break;}
		case 2:{
			contem();
			break;}
		case 3:{
			confre();
			break;}
		case 4:{
			convol();
			break;}
		case 5:{
			concom();
			break;}		
		case 6:{
		     opcao = menuMatematica();
		     if(opcao == 1)
		     printf("Digital o valor: ");
			 scanf("%i", &opcao);
			 printf("O fatorial do %i=%1", opcao,fatorialRecursivo(opcao));
			break;}
	    case 7:{
			printf("Obrigado por usar nosso software");
			break;}	
		default:{
			printf("\n\nEscolha uma opcao valida!!!!\n\n");
			main();
			break;}	
	}
}

