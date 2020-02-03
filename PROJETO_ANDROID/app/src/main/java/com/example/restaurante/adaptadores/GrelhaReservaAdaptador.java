package com.example.restaurante.adaptadores;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.example.restaurante.R;
import com.example.restaurante.modelo.Reserva;

import java.util.ArrayList;

public class GrelhaReservaAdaptador extends BaseAdapter {


    private Context context;
    private LayoutInflater layoutInflater;
    private ArrayList<Reserva> reservas;

    public GrelhaReservaAdaptador(Context context, ArrayList<Reserva> reservas){
        this.context = context;
        this.reservas = reservas;
    }

    @Override
    public int getCount() {
        return reservas.size();
    }

    @Override
    public Object getItem(int i) {
        return reservas.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        if (layoutInflater == null)
            layoutInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);

        if (view == null)
            view = layoutInflater.inflate(R.layout.item_grelha_reserva, null);

        GrelhaReservaAdaptador.ViewHolderGrelha viewHolder = (GrelhaReservaAdaptador.ViewHolderGrelha) view.getTag();
        if (viewHolder==null){
            viewHolder=new GrelhaReservaAdaptador.ViewHolderGrelha(view);
            view.setTag(viewHolder);
        }
        viewHolder.update(i);

        return view;
    }

    private class ViewHolderGrelha {


        private TextView tvNumeroPessoas, tvDataReserva;

        public ViewHolderGrelha(View view) {
            tvNumeroPessoas = view.findViewById(R.id.tv_numeroPessoas);
            tvDataReserva = view.findViewById(R.id.tv_dataReserva);

        }

        public void update(int position) {
            Reserva reserva = reservas.get(position);
            tvNumeroPessoas.setText(reserva.getPessoas_reserva() + "");
            tvDataReserva.setText(reserva.getData_reserva() + "");
        }
    }
}
