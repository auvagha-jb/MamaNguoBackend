package com.sourcey.materiallogindemo;

import android.os.Bundle;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.res.ResourcesCompat;

import com.alimuzaffar.lib.pin.PinEntryEditText;

public class PinVerifyActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pin_verify);

        final PinEntryEditText pinEntry = findViewById(R.id.txt_pin_entry);
        if (pinEntry != null) {
            pinEntry.setTypeface(ResourcesCompat.getFont(this, R.font.charmonman_regular));
            pinEntry.setOnPinEnteredListener(str -> {
                if (str.toString().equals("1234")) {
                    Toast.makeText(PinVerifyActivity.this, "SUCCESS", Toast.LENGTH_SHORT).show();
                } else {
                    pinEntry.setError(true);
                    Toast.makeText(PinVerifyActivity.this, "FAIL", Toast.LENGTH_SHORT).show();
                    pinEntry.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            pinEntry.setText(null);
                        }
                    }, 1000);
                }
            });
        }
    }

}

