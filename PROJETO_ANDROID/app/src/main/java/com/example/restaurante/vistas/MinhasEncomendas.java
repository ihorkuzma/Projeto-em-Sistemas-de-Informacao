package com.example.restaurante.vistas;

import androidx.appcompat.app.AppCompatActivity;
import com.example.restaurante.R;
import com.example.restaurante.adaptadores.GrelhaLinhaVendaAdaptador;
import com.example.restaurante.listeners.LinhaVendaListaListener;
import com.example.restaurante.modelo.Linhavenda;
import com.example.restaurante.modelo.SingletonGestorRestaurante;
import com.example.restaurante.utils.LinhavendaListaJsonParser;

import android.app.Activity;
import android.os.Bundle;
import android.widget.GridView;

import java.util.ArrayList;

public class MinhasEncomendas extends AppCompatActivity implements LinhaVendaListaListener {

    public static final String MyPREFERENCES = "MyPrefs" ;
    private GridView gvGrelhaLinhavenda;
    private GrelhaLinhaVendaAdaptador grelhaLinhaVendaAdaptador;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_minhas_encomendas);

        gvGrelhaLinhavenda = (GridView) findViewById(R.id.lvGrelhaLinhavenda);
        SingletonGestorRestaurante.getInstance(getApplicationContext()).setLinhaVendaListaListener(this);
    }

    @Override
    public void onResume() {
        super.onResume();
        final String token = this.getSharedPreferences(MyPREFERENCES, Activity.MODE_PRIVATE).getString("token", "");
        SingletonGestorRestaurante.getInstance(getApplicationContext()).getLinhavendaAPI(getApplicationContext(), LinhavendaListaJsonParser.isConnectionInternet(getApplicationContext()), token);
    }

    @Override
    public void onRefreshListaLinhaVenda(ArrayList<Linhavenda> listaLinhavendas) {
        grelhaLinhaVendaAdaptador= new GrelhaLinhaVendaAdaptador(this,listaLinhavendas);
        gvGrelhaLinhavenda.setAdapter(grelhaLinhaVendaAdaptador);
    }
}
