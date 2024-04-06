package com.example.radiobuttondemo;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    RadioButton r_a, r_b, r_c;
    Button test;
    TextView msg;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        // kiểm tra trạng thái chọn hay không chọn
       // radioButton.isChecked();

        r_a = findViewById(R.id.radio_a);
        r_b = findViewById(R.id.radio_b);
        r_c = findViewById(R.id.radio_c);

        test = findViewById(R.id.test);
        msg = findViewById(R.id.mgs);

        r_a.setOnCheckedChangeListener(listener);
        r_b.setOnCheckedChangeListener(listener);
        r_c.setOnCheckedChangeListener(listener);

        test.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(r_b.isChecked()){
                    msg.setText("Ban chon dung");
                }
                else{
                    msg.setText("Ban chon sai");
                }
            }
        });
    }

    CompoundButton.OnCheckedChangeListener listener = new CompoundButton.OnCheckedChangeListener() {
        @Override
        public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
            test.setEnabled(true);

            if(isChecked){
                String s = buttonView.getText().toString();
                msg.setText("Ban chon: " + s);
            }
        }
    };
}