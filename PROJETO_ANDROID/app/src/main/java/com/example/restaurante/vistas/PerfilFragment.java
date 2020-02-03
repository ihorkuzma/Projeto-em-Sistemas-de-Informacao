package com.example.restaurante.vistas;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.restaurante.MainActivity;
import com.example.restaurante.R;
import com.example.restaurante.listeners.ClienteListener;
import com.example.restaurante.modelo.Cliente;
import com.example.restaurante.modelo.SharedPreferencesGestor;
import com.example.restaurante.modelo.SingletonGestorRestaurante;
import com.example.restaurante.utils.ClienteJsonParser;

/**
 * A simple {@link Fragment} subclass.
 */
public class PerfilFragment extends Fragment implements ClienteListener{
    public static final String MyPREFERENCES = "MyPrefs" ;
    private Cliente cliente;
    private EditText etNome, etTelemovel, etMorada;
    private Button atualizar;
    private int id;

    public PerfilFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View view = inflater.inflate(R.layout.fragment_perfil, container, false);
        Button encomendas = (Button) view.findViewById(R.id.MinhasEncomendas);
        Button reservas = (Button) view.findViewById(R.id.MinhasReservas);
        atualizar = view.findViewById(R.id.PerfilAtualizar);
        etNome = view.findViewById(R.id.PerfilNome);
        etTelemovel = view.findViewById(R.id.PerfilTelemovel);
        etMorada = view.findViewById(R.id.PerfilMorada);

        SingletonGestorRestaurante.getInstance(getActivity().getApplicationContext()).setClienteListener(this);

        String token = this.getActivity().getSharedPreferences(MyPREFERENCES, Activity.MODE_PRIVATE).getString("token", "");
        SingletonGestorRestaurante.getInstance(getActivity().getApplicationContext()).getClienteAPI(getActivity().getApplicationContext(), ClienteJsonParser.isConnectionInternet(getActivity().getApplicationContext()), token);


        atualizar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String nome=etNome.getText().toString();
                String telemovel=etTelemovel.getText().toString();
                String morada=etMorada.getText().toString();
                if (!ClienteJsonParser.isConnectionInternet(getActivity().getApplicationContext()))
                    Toast.makeText(getActivity().getApplicationContext(), "Internet is not avaliable", Toast.LENGTH_SHORT).show();
                else {
                    SingletonGestorRestaurante.getInstance(getActivity().getApplicationContext()).editarClienteAPI(getActivity().getApplicationContext(), ClienteJsonParser.isConnectionInternet(getActivity().getApplicationContext()),id,nome,telemovel,morada);
                    Toast.makeText(getActivity().getApplicationContext(), "AUTALIZADO", Toast.LENGTH_SHORT).show();
                }
            }
        });

        encomendas.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), MinhasEncomendas.class);
                startActivity(intent);
            }
        });

        reservas.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), MinhasReservas.class);
                startActivity(intent);
            }
        });
        return view;
    }

    @Override
    public void onRefreshCliente(Cliente cliente) {
        if (cliente != null) {
            this.id = cliente.getId();
            this.etNome.setText(cliente.getNome());
            this.etTelemovel.setText(cliente.getTelemovel());
            this.etMorada.setText(cliente.getMorada());
        } else
            Toast.makeText(getActivity().getApplicationContext(), "ERRO, NAO CONSEGUIMOS BUSCAR O SEU PERFIL", Toast.LENGTH_SHORT).show();
    }
}
