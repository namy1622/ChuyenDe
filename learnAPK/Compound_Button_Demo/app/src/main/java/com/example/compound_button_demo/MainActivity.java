package com.example.compound_button_demo;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    CheckBox pa1, pa2,pa3, pa4;
    Button kiemtra, goiy;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        init();

    }

    //khởi gọi các đối tượng
    void init(){
        pa1 = findViewById(R.id.pa1);
        pa2 = findViewById(R.id.pa2);
        pa3 = findViewById(R.id.pa3);
        pa4 = findViewById(R.id.pa4);



        //gán sự kiện cho checkbox khi chọn checkBox nào đó
        pa1.setOnCheckedChangeListener(mListener);
        pa2.setOnCheckedChangeListener(mListener);
        pa3.setOnCheckedChangeListener(mListener);
        pa4.setOnCheckedChangeListener(mListener);

        kiemtra = findViewById(R.id.kiemtra);
        goiy = findViewById(R.id.goiy);

        kiemtra.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(pa3.isChecked() && (!pa1.isChecked()) && (!pa2.isChecked()) && (!pa4.isChecked())){
                    kiemtra.setText("Ban chon dung");
                }
                else{
                    kiemtra.setText("Ban chon sai");
                }
            }
        });

        goiy.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pa3.setTextColor(Color.GREEN);
            }
        });

    }

    CompoundButton.OnCheckedChangeListener mListener = new CompoundButton.OnCheckedChangeListener() {
        @Override
        public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
            if(isChecked){
                Toast.makeText(MainActivity.this,
                               "Ban vua chon: " + buttonView.getText().toString(),
                                Toast.LENGTH_SHORT).show();
            }
        }
    };
}