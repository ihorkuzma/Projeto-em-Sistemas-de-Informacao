package com.example.restaurante.adaptadores;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.restaurante.R;
import com.example.restaurante.modelo.Linhavenda;

import java.util.ArrayList;

public class GrelhaLinhaVendaAdaptador extends BaseAdapter {

    private Context context;
    private LayoutInflater layoutInflater;
    private ArrayList<Linhavenda> linhavendas;

    public GrelhaLinhaVendaAdaptador(Context context, ArrayList<Linhavenda> linhavendas){
        this.context = context;
        this.linhavendas = linhavendas;
    }

    @Override
    public int getCount() {
        return linhavendas.size();
    }

    @Override
    public Object getItem(int i) {
        return linhavendas.get(i);
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
            view = layoutInflater.inflate(R.layout.item_grelha_linhavenda, null);

        GrelhaLinhaVendaAdaptador.ViewHolderGrelha viewHolder = (GrelhaLinhaVendaAdaptador.ViewHolderGrelha) view.getTag();
        if (viewHolder==null){
            viewHolder=new GrelhaLinhaVendaAdaptador.ViewHolderGrelha(view);
            view.setTag(viewHolder);
        }
        viewHolder.update(i);



        return view;
    }


    private class ViewHolderGrelha {

        private TextView tvQuantidade, tvNomeAlimento;

        public ViewHolderGrelha(View view) {
            tvNomeAlimento = view.findViewById(R.id.tv_nome_Alimento);
            tvQuantidade = view.findViewById(R.id.tv_quantidade);

        }

        public void update(int position) {
            Linhavenda linhavenda = linhavendas.get(position);
            tvNomeAlimento.setText(linhavenda.getNome_alimento());
            tvQuantidade.setText(linhavenda.getQuantidade_linhavenda() + "");
        }
    }

}
