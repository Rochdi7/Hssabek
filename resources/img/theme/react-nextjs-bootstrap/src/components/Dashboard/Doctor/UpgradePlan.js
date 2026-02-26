"use client";

import React from "react";
import Image from "next/image";
import { Card } from "react-bootstrap";

const UpgradePlan = () => {
  return (
    <>
      <Card
        className="border-0 rounded-3 p-4 mb-4"
        style={{
          background: "linear-gradient(90deg, #4936F5 0%, #4737D6 100%)",
        }}
      >
        <div className="d-flex flex-wrap gap-3 align-items-center justify-content-between">
          <h3
            className="fs-20 text-white mb-0"
            style={{
              maxWidth: "300px",
              lineHeight: 1.6,
            }}
          >
            Upgrade Plan To Manage 20K+ Patients
          </h3>

          <div>
            <Image
              src="/images/upgrade.png"
              alt="upgrade"
              width={145}
              height={76}
            />
          </div>
        </div>
      </Card>
    </>
  );
};

export default UpgradePlan;
