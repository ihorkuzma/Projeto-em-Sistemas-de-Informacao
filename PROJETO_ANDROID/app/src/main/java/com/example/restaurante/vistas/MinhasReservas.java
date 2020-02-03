package com.example.restaurante.vistas;

import androidx.appcompat.app.AppCompatActivity;
import com.example.restaurante.R;
import com.example.restaurante.adaptadores.GrelhaReservaAdaptador;
import com.example.restaurante.listeners.ReservaListaListener;
import com.example.restaurante.modelo.Reserva;
import com.example.restaurante.modelo.SingletonGestorRestaurante;
import com.example.restaurante.utils.ReservaListaJsonParser;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.GridView;

import java.util.ArrayList;

public class MinhasReservas extends AppCompatActivity implements ReservaListaListener {
    private ArrayList<Reserva> reservas;
    public static final String MyPREFERENCES = "MyPrefs" ;
    private GridView gvGrelhaReservas;
    private GrelhaReservaAdaptador grelhaReservaAdaptador;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_minhas_reservas);
        gvGrelhaReservas = (GridView) findViewById(R.id.lvGrelhaReservas);
        SingletonGestorRestaurante.getInstance(getApplicationContext()).setReservaListaListener(this);

        gvGrelhaReservas.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                dialogRemover(reservas.get(position).getId_reserva());
            }
        });

    }

    @Override
    public void onResume() {
        super.onResume();
        final String token = this.getSharedPreferences(MyPREFERENCES, Activity.MODE_PRIVATE).getString("token", "");
        SingletonGestorRestaurante.getInstance(getApplicationContext()).getReservaAPI(getApplicationContext(), ReservaListaJsonParser.isConnectionInternet(getApplicationContext()), token);
    }

    @Override
    public void onRefreshListaReservas(ArrayList<Reserva> listaReservas) {
        grelhaReservaAdaptador = new GrelhaReservaAdaptador(this,listaReservas);
        gvGrelhaReservas.setAdapter(grelhaReservaAdaptador);
        this.reservas = listaReservas;
    }

    private void dialogRemover(final int id) {
        AlertDialog.Builder builder=new AlertDialog.Builder(this);
        builder.setTitle("Remover Reserva")
                .setMessage("Pretende mesmo remover reserva?")
                .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        SingletonGestorRestaurante.getInstance(getApplicationContext()).eliminarReservaAPI(getApplicationContext(), ReservaListaJsonParser.isConnectionInternet(getApplicationContext()), id);
                        setResult(Activity.RESULT_OK);
                        finish();
                    }
                })
                .setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                    }
                })
                .show();
    }
}
