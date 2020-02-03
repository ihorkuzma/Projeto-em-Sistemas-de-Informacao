package com.example.restaurante.modelo;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;

public class RestauranteBDHelper extends SQLiteOpenHelper{

    private static final String DB_NAME="RestauranteBD";
    private static final int DB_VERSION=1;
    private final SQLiteDatabase database;

    //************************************ALIMENTO*********************************************
    private static final String TABLE_ALIMENTO="alimento";
    private static final String ID_ALIMENTO="id";
    private static final String NOME_ALIMENTO="Nome_alimento";
    private static final String PRECO_ALIMENTO="Preco";
    //*****************************************************************************************

    //************************************RESERVAS*********************************************
    private static final String TABLE_RESERVA="reserva";
    private static final String ID_RESERVA="id";
    private static final String PESSOAS_RESERVA="Numero_pessoas";
    private static final String CLIENTE_ID_RESERVA="Cliente_id";
    private static final String DATA_RESERVA="Data_reserva";
    //*****************************************************************************************

    //************************************LINHAVENDAS*********************************************
    private static final String TABLE_LINHAVENDAS="linhavenda";
    private static final String ID_LINHAVENDAS="id";
    private static final String NOME_LINHAVENDAS="nome";
    private static final String QUANTIDADE_LINHAVENDAS="quantidade";
    //*****************************************************************************************



    public RestauranteBDHelper(Context context) {
        super(context, DB_NAME, null, DB_VERSION);
        this.database=getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        String createTableAlimento="CREATE TABLE "+TABLE_ALIMENTO+
                "( "+ID_ALIMENTO+ " INTEGER PRIMARY KEY AUTOINCREMENT, "+
                NOME_ALIMENTO + " TEXT NOT NULL, "+
                PRECO_ALIMENTO + " INTEGER NOT NULL);";
        db.execSQL(createTableAlimento);

        String createTableReservas="CREATE TABLE "+TABLE_RESERVA+
                "( "+ID_RESERVA+ " INTEGER PRIMARY KEY AUTOINCREMENT, "+
                PESSOAS_RESERVA + " INTEGER NOT NULL, "+
                CLIENTE_ID_RESERVA + " INTEGER NOT NULL, "+
                DATA_RESERVA + " TEXT NOT NULL);";
        db.execSQL(createTableReservas);

        String createTableLinhavendas="CREATE TABLE "+TABLE_LINHAVENDAS+
                "( "+ID_LINHAVENDAS+ " INTEGER PRIMARY KEY AUTOINCREMENT, "+
                QUANTIDADE_LINHAVENDAS + " INTEGER NOT NULL, "+
                NOME_LINHAVENDAS+ " TEXT NOT NULL);";
        db.execSQL(createTableLinhavendas);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS "+ TABLE_ALIMENTO + TABLE_RESERVA + TABLE_LINHAVENDAS);
        this.onCreate(db);
    }


    //**************************************************************OPERACOES******************************************************

    public ArrayList<Alimento> getAllAlimentosBD(){
        ArrayList<Alimento> alimentos = new ArrayList<>();
        Cursor cursor = this.database.query(TABLE_ALIMENTO, new String[] {ID_ALIMENTO,NOME_ALIMENTO,PRECO_ALIMENTO}, null,null, null, null, null);
        if (cursor.moveToFirst()){
            do {
                Alimento auxAlimento = new Alimento(cursor.getInt(0),cursor.getString(1), cursor.getInt(2));
                alimentos.add(auxAlimento);
            }while (cursor.moveToNext());
            cursor.close();
        }
        return alimentos;
    }

    public void removerAllAlimentos() {
        this.database.delete(TABLE_ALIMENTO, null, null);
    }

    public void adicionarAlimentoBD(Alimento alimento){
        ContentValues values=new ContentValues();
        values.put(ID_ALIMENTO, alimento.getId_alimento());
        values.put(NOME_ALIMENTO, alimento.getNome_alimento());
        values.put(PRECO_ALIMENTO, alimento.getPreco_alimento());
    }

    public ArrayList<Linhavenda> getAllLinhavendasBD(){
        ArrayList<Linhavenda> linhavendas = new ArrayList<>();
        Cursor cursor = this.database.query(TABLE_LINHAVENDAS, new String[] {ID_LINHAVENDAS,QUANTIDADE_LINHAVENDAS, NOME_LINHAVENDAS}, null,null, null, null, null);
        if (cursor.moveToFirst()){
            do {
                Linhavenda auxLinhavenda = new Linhavenda(cursor.getInt(0), cursor.getInt(1), cursor.getString(2));
                linhavendas.add(auxLinhavenda);
            }while (cursor.moveToNext());
            cursor.close();
        }
        return linhavendas;
    }
    public void removerAllLinhavendas() {
        this.database.delete(TABLE_LINHAVENDAS, null, null);
    }

    public void adicionarLinhavendaBD(Linhavenda linhavenda){
        ContentValues values=new ContentValues();
        values.put(ID_LINHAVENDAS, linhavenda.getId_linhavenda());
        values.put(NOME_LINHAVENDAS, linhavenda.getNome_alimento());
        values.put(QUANTIDADE_LINHAVENDAS, linhavenda.getQuantidade_linhavenda());
    }

    public ArrayList<Reserva> getAllReservasBD(){
        ArrayList<Reserva> reservas = new ArrayList<>();
        Cursor cursor = this.database.query(TABLE_RESERVA, new String[] {ID_RESERVA,PESSOAS_RESERVA, CLIENTE_ID_RESERVA, DATA_RESERVA}, null,null, null, null, null);
        if (cursor.moveToFirst()){
            do {
                Reserva auxReserva = new Reserva(cursor.getInt(0), cursor.getInt(1), cursor.getInt(2), cursor.getString(3));
                reservas.add(auxReserva);
            }while (cursor.moveToNext());
            cursor.close();
        }
        return reservas;
    }
    public void removerAllReservas() {
        this.database.delete(TABLE_RESERVA, null, null);
    }

    public void adicionarReservaBD(Reserva reserva){
        ContentValues values=new ContentValues();
        values.put(ID_RESERVA, reserva.getId_reserva());
        values.put(PESSOAS_RESERVA, reserva.getPessoas_reserva());
        values.put(CLIENTE_ID_RESERVA, reserva.getCliente_id());
        values.put(DATA_RESERVA, reserva.getData_reserva());
    }
}
