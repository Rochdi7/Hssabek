"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";
import Image from "next/image";

const GrossEarnings = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Earnings",
      data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    stroke: {
      width: 4,
      curve: "smooth",
    },
    xaxis: {
      categories: ["1W", "2W", "3W", "4W", "5W", "6W", "7W", "8W", "9W", "10W"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    colors: ["#9135E8"],
    yaxis: {
      show: false,
      labels: {
        formatter: (val) => {
          return "$" + val + "K";
        },
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
  };

  return (
    <>
      <Card className="bg-primary-div bg-opacity-10 border-0 rounded-3 p-4 mb-4">
        <div className="d-flex align-items-center gap-3">
          <div className="flex-shrink-0">
            <Image
              src="/images/balance-2.png"
              alt="balance"
              width={40}
              height={40}
            />
          </div>

          <div className="flex-grow-1">
            <span className="mb-1 d-block fw-medium text-body">
              GROSS EARNINGS
            </span>

            <div className="d-flex">
              <h3 className="mb-0 fs-20 fw-semibold me-2">$78,350.00</h3>

              <span className="material-symbols-outlined fs-16 position-relative top-3 text-success">
                trending_up
              </span>
              <span className="text-success">+2.3%</span>
            </div>
          </div>
        </div>

        <div>
          {Chart && (
            <Chart options={options} series={series} type="line" height={207} />
          )}
        </div>

        <div
          className="d-flex justify-content-between pt-4 for-dark-border"
          style={{
            borderTop: "1px solid #E9D5FF",
          }}
        >
          <div>
            <span className="fs-14 d-block mb-1">Total Balance</span>
            <h3 className="fs-20 fw-medium mb-0">$3,42,890</h3>
          </div>
          <div>
            <span className="fs-14 d-block mb-1">Withdrawals</span>
            <h3 className="fs-20 fw-medium mb-0">$2,35,425</h3>
          </div>
        </div>
      </Card>
    </>
  );
};

export default GrossEarnings;
