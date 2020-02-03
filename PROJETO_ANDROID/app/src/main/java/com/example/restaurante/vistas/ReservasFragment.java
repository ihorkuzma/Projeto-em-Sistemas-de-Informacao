package com.example.restaurante.vistas;


import android.app.Activity;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.restaurante.R;
import com.example.restaurante.listeners.ReservaListener;
import com.example.restaurante.modelo.Reserva;
import com.example.restaurante.modelo.SingletonGestorRestaurante;
import com.example.restaurante.utils.ReservasJsonParser;

import java.util.ArrayList;

/**
 * A simple {@link Fragment} subclass.
 */
public class ReservasFragment extends Fragment implements ReservaListener {
    public static final String MyPREFERENCES = "MyPrefs" ;

    private EditText etReservaPessoa, etReservaData;
    private Button reservar;

    public ReservasFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_reservas, container, false);
        etReservaPessoa = view.findViewById(R.id.ReservaPessoas);
        etReservaData = view.findViewById(R.id.ReservaData);
        reservar = (Button) view.findViewById(R.id.btnReserva);
        SingletonGestorRestaurante.getInstance(getActivity().getApplicationContext()).setReservaListener(this);

        final String token = this.getActivity().getSharedPreferences(MyPREFERENCES, Activity.MODE_PRIVATE).getString("token", "");

        reservar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String NPessoas=etReservaPessoa.getText().toString();
                String Data=etReservaData.getText().toString();

                if (!ReservasJsonParser.isConnectionInternet(getActivity().getApplicationContext()))
                    Toast.makeText(getActivity().getApplicationContext(), "Internet is not avaliable", Toast.LENGTH_SHORT).show();
                else {
                    SingletonGestorRestaurante.getInstance(getActivity().getApplicationContext()).adicionarReservaAPI(getActivity()
                            .getApplicationContext(), ReservasJsonParser.isConnectionInternet(getActivity().getApplicationContext()),token, NPessoas, Data);
                    Toast.makeText(getActivity().getApplicationContext(), "RESERVADO", Toast.LENGTH_SHORT).show();
                }
            }
        });
        return view;
    }

    @Override
    public void onRefreshReserva(Reserva reserva) {
        if (reserva != null) {
            Toast.makeText(getActivity().getApplicationContext(), "RESERVADO COM SUCESSO", Toast.LENGTH_SHORT).show();
        } else
            Toast.makeText(getActivity().getApplicationContext(), "ERRO, NAO CONSEGUIMOS BUSCAR O SUA RESERVA", Toast.LENGTH_SHORT).show();
    }
}
