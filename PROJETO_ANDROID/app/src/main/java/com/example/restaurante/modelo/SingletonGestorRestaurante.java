package com.example.restaurante.modelo;

import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.restaurante.listeners.AlimentoListener;
import com.example.restaurante.listeners.ClienteListener;
import com.example.restaurante.listeners.LinhaVendaListaListener;
import com.example.restaurante.listeners.LoginListener;
import com.example.restaurante.listeners.ReservaListaListener;
import com.example.restaurante.listeners.ReservaListener;
import com.example.restaurante.utils.AlimentosJsonParser;
import com.example.restaurante.utils.ClienteJsonParser;
import com.example.restaurante.utils.LinhavendaListaJsonParser;
import com.example.restaurante.utils.LoginJsonParser;
import com.example.restaurante.utils.ReservaListaJsonParser;
import com.example.restaurante.utils.ReservasJsonParser;

import org.json.JSONArray;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class SingletonGestorRestaurante {

    private static RequestQueue volleyQueue;

    private ArrayList<Alimento> alimentos;
    private ArrayList<Linhavenda> linhavendas;
    private ArrayList<Reserva> reservas;

    private RestauranteBDHelper restauranteBD;
    private LoginListener loginListener;
    private ClienteListener clienteListener;
    private AlimentoListener alimentosListener;
    private ReservaListaListener reservaListaListener;
    private LinhaVendaListaListener linhaVendaListaListener;
    private ReservaListener reservaListener;

    private static SingletonGestorRestaurante instance = null;
    private final String mUrlAPIUsers = "http://192.168.1.71:8888/web/api/login/login";
    private final String mUrlAPIAlimentos = "http://192.168.1.71:8888/web/api/alimentos";
    private final String mUrlAPICliente = "http://192.168.1.71:8888/web/api/clientes/clientes/";
    private final String mUrlAPIEditarCliente = "http://192.168.1.71:8888/web/api/clientes/";
    private final String mUrlAPIReserva = "http://192.168.1.71:8888/web/api/reservas/getreservas";
    private final String mUrlAPIAdicionarReserva = "http://192.168.1.71:8888/web/api/reservas/reservas/";
    private final String mUrlAPIEliminarReserva = "http://192.168.1.71:8888/web/api/reservas/";
    private final String mUrlAPILinhavendas = "http://192.168.1.71:8888/web/api/linhavendas/getlinhavendas";
    private final String mUrlAPIPedido = "http://192.168.1.71:8888/web/api/alimentos/pedido/";

    public void setLinhaVendaListaListener(LinhaVendaListaListener reservaListaListener) {
        this.linhaVendaListaListener = reservaListaListener;
    }

    public void setReservaListaListener(ReservaListaListener reservaListaListener) {
        this.reservaListaListener = reservaListaListener;
    }

    public void setReservaListener(ReservaListener reservaListener) {
        this.reservaListener = reservaListener;
    }

    public void setLoginListener(LoginListener loginListener) {
        this.loginListener = loginListener;
    }

    public void setClienteListener(ClienteListener clienteListener) {
        this.clienteListener = clienteListener;
    }

    public static synchronized SingletonGestorRestaurante getInstance(Context context) {
        if (instance == null)
            instance = new SingletonGestorRestaurante(context);
        volleyQueue = Volley.newRequestQueue(context);
        return instance;
    }

    private SingletonGestorRestaurante(Context context) {
        alimentos=new ArrayList<>();
        linhavendas = new ArrayList<>();
        reservas = new ArrayList<>();
        restauranteBD = new RestauranteBDHelper(context);
    }

    public void setAlimentosListener(AlimentoListener alimentosListener) {
        this.alimentosListener = alimentosListener;
    }

    public ArrayList<Alimento> getAlimentoBD() {
        return restauranteBD.getAllAlimentosBD();
    }

    public void adicionarAlimentosBD(ArrayList<Alimento> listaAlimentos) {
        restauranteBD.removerAllAlimentos();
        for(Alimento alimento:listaAlimentos)
            adicionarAlimentoBD(alimento);
    }

    public void adicionarAlimentoBD(Alimento alimento) {
        restauranteBD.adicionarAlimentoBD(alimento);
    }


    public void adicionarLinhavendasBD(ArrayList<Linhavenda> listaLinhavendas) {
        restauranteBD.removerAllLinhavendas();
        for(Linhavenda linhavenda:listaLinhavendas)
            adicionarLinhavendaBD(linhavenda);
    }

    public void adicionarLinhavendaBD(Linhavenda linhavenda) {
        restauranteBD.adicionarLinhavendaBD(linhavenda);
    }


    public void adicionarReservasBD(ArrayList<Reserva> listaReservas) {
        restauranteBD.removerAllReservas();
        for(Reserva reserva:listaReservas)
            adicionarLinhavendaBD(reserva);
    }

    public void adicionarLinhavendaBD(Reserva reserva) {
        restauranteBD.adicionarReservaBD(reserva);
    }


    //**********************************ACESSOS API***************************************

    //-----------------------------------------------LOGIN------------------------------------------
    public void getTokenAPI(final Context context, boolean isConnected, final String username, final String password) {

        if (!isConnected)
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();

        else {
            StringRequest req = new StringRequest(Request.Method.POST, mUrlAPIUsers,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            loginListener.onRefreshLogin(LoginJsonParser.parserJsonLogin(response, context));
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    error.printStackTrace();
                    Toast.makeText(context, "ERRO:"+ error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams() {
                    Log.i("USERNAME", username);
                    Log.i("PASSWORD", password);
                    Map<String, String> params = new HashMap<>();
                    params.put("username", username);
                    params.put("password", password);
                    return params;
                }

            };
            volleyQueue.add(req);
        }
    }
    //----------------------------------------------------------------------------------------------

    public void getAllAlimentosAPI(final Context context, boolean isConnected){
        if (!isConnected){
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();
            alimentos=restauranteBD.getAllAlimentosBD();

            //INFORMAR A VISTA

            if (alimentosListener!=null){
                alimentosListener.onRefreshListaAlimentos(alimentos);
            }
        }
        else{
            JsonArrayRequest req=new JsonArrayRequest(Request.Method.GET, mUrlAPIAlimentos, null, new Response.Listener<JSONArray>(){
                @Override
                public void onResponse(JSONArray response) {
                    alimentos = AlimentosJsonParser.parserJsonAlimentos(response, context);
                    adicionarAlimentosBD(alimentos);
                    //************INFORMAR A VISTA**********************
                    if (alimentosListener!=null){
                        alimentosListener.onRefreshListaAlimentos(alimentos);
                    }

                }
            },new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(context, error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            });
            volleyQueue.add(req);
        }
    }

    public void getClienteAPI(final Context context, boolean isConnected, final String token) {

        if (!isConnected)
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();

        else {
            String URL = mUrlAPICliente + "?token=" + token;
            StringRequest req = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            clienteListener.onRefreshCliente(ClienteJsonParser.parserJsonCliente(response, context));
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(context, "ERRO:"+ error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }) {


            };
            volleyQueue.add(req);
        }
    }

    public void editarClienteAPI(final Context context, boolean isConnected, final int id, final String nome, final String telemovel, final String morada) {

        if (!isConnected)
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();

        else {
            String URL = mUrlAPIEditarCliente + id;
            StringRequest req = new StringRequest(Request.Method.PUT, URL,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            clienteListener.onRefreshCliente(ClienteJsonParser.parserJsonCliente(response, context));
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(context, "ERRO:"+ error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams() {
                    Map<String, String> params = new HashMap<>();
                    params.put("Nome", nome);
                    params.put("Telemovel", telemovel);
                    params.put("Morada", morada);
                    Log.i("NOME CLIENTE", nome);
                    Log.i("TELEMOVEL CLIENTE", telemovel);
                    Log.i("MORADA CLIENTE", morada);
                    return params;
                }
            };
            volleyQueue.add(req);
        }
    }

    public void adicionarReservaAPI(final Context context, boolean isConnected, final String token, final String NumeroPessoas ,final String Data_Reserva) {

        if (!isConnected)
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();

        else {
            //String URL = ;
            StringRequest req = new StringRequest(Request.Method.POST, mUrlAPIAdicionarReserva,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            reservaListener.onRefreshReserva(ReservasJsonParser.parserJsonReserva(response, context));
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    error.printStackTrace();
                    Log.i("AAAAAAAAAAAAA", error.toString());
                    //Toast.makeText(context, "ERRO:"+ error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams() {

                    Map<String, String> params = new HashMap<>();

                    params.put("token", token);
                    params.put("Numero_pessoas", NumeroPessoas);
                    params.put("Data_reserva", Data_Reserva);
                    Log.i("AKIIIIIIIIIII", params.toString());
                    return params;

                }
            };
            volleyQueue.add(req);
        }
    }

    public void getReservaAPI(final Context context, boolean isConnected, final String token){
        if (!isConnected){
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();
            reservas = restauranteBD.getAllReservasBD();
            //INFORMAR A VISTA

            if (reservaListaListener!=null){
                reservaListaListener.onRefreshListaReservas(reservas);
            }
        }
        else{
            String URL = mUrlAPIReserva + "?token=" + token;
            JsonArrayRequest req=new JsonArrayRequest(Request.Method.GET, URL, null, new Response.Listener<JSONArray>(){
                @Override
                public void onResponse(JSONArray response) {
                    reservas = ReservaListaJsonParser.parserJsonListaReservas(response, context);
                    adicionarReservasBD(reservas);
                    //************INFORMAR A VISTA**********************
                    if (reservaListaListener!=null){
                        reservaListaListener.onRefreshListaReservas(reservas);
                    }

                }
            },new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(context, error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            });
            volleyQueue.add(req);
        }
    }

    public void eliminarReservaAPI(final Context context, boolean isConnected, final int id) {
        String URL = mUrlAPIEliminarReserva + id;
        StringRequest req=new StringRequest(Request.Method.DELETE, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(context, error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() {
                Map<String,String> params = new HashMap<>();

                params.put("id", String.valueOf(id));
                return params;
            }
        };
        volleyQueue.add(req);
    }

    public void getLinhavendaAPI(final Context context, boolean isConnected, final String token){
        if (!isConnected){
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();
            linhavendas=restauranteBD.getAllLinhavendasBD();
            //INFORMAR A VISTA

            if (linhaVendaListaListener!=null){
                linhaVendaListaListener.onRefreshListaLinhaVenda(linhavendas);
            }
        }
        else{
            String URL = mUrlAPILinhavendas + "?token=" + token;
            JsonArrayRequest req=new JsonArrayRequest(Request.Method.GET, URL, null, new Response.Listener<JSONArray>(){
                @Override
                public void onResponse(JSONArray response) {
                    linhavendas = LinhavendaListaJsonParser.parserJsonListaLinhavendas(response, context);
                    adicionarLinhavendasBD(linhavendas);
                    //************INFORMAR A VISTA**********************
                    if (linhaVendaListaListener!=null){
                        linhaVendaListaListener.onRefreshListaLinhaVenda(linhavendas);
                    }

                }
            },new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(context, error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            });
            volleyQueue.add(req);
        }
    }

    public void pedidoAPI(final Context context, boolean isConnected, final String token, final int id_alimento) {

        if (!isConnected)
            Toast.makeText(context, "No Internet Connection", Toast.LENGTH_SHORT).show();

        else {
            //String URL = ;
            StringRequest req = new StringRequest(Request.Method.POST, mUrlAPIPedido,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Toast.makeText(context, response, Toast.LENGTH_SHORT).show();
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    error.printStackTrace();
                }
            }) {
                @Override
                protected Map<String, String> getParams() {

                    Map<String, String> params = new HashMap<>();

                    params.put("token", token);
                    params.put("id_alimento", String.valueOf(id_alimento));
                    return params;

                }
            };
            volleyQueue.add(req);
        }
    }
}