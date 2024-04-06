package com.example.buttondemo;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

     Button button1;
      Button button2;
      Button button3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        button1 = findViewById(R.id.button);

        button1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(MainActivity.this,
                        "Bạn bấm vào nút bấm Button1",
                        Toast.LENGTH_SHORT).show();

            }
        });

        button2 = findViewById(R.id.button2);
        button3 = findViewById(R.id.button3);

        // gán sk mListener cho button2, button3
        button2.setOnClickListener(mListener);
        button3.setOnClickListener(mListener);


    }
    // thiết lập sự kiện OnClickListener cho nút bấm
    View.OnClickListener mListener = new View.OnClickListener() {
        @Override
        public  void onClick(View v) {
            // lấy Id của nút đã bấm rồi gán cho id
             int id = v.getId();

//            switch(id){
//                case  (R.id.button2):
//                    Toast.makeText(MainActivity.this,
//                            "Bạn bấm vào nút bấm Button2",
//                            Toast.LENGTH_SHORT).show();
//                    break;
//                case R.id.button3:
//                    Toast.makeText(MainActivity.this,
//                            "Bạn bấm vào nút bấm Button3",
//                            Toast.LENGTH_SHORT).show();
//                    break;
//
//                default:
//                    break;
//            }

            //cách khác
            if (id == R.id.button2) {
                Toast.makeText(MainActivity.this,
                        "Bạn bấm vào nút bấm Button2",
                        Toast.LENGTH_SHORT).show();
            } else if (id == R.id.button3) {
                Toast.makeText(MainActivity.this,
                        "Bạn bấm vào nút bấm Button3",
                        Toast.LENGTH_SHORT).show();
            }
        }
    };
}