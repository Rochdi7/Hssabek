"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";

const Cardano = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Price",
      data: [90, 130, 95, 140, 110, 120, 85, 170],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
      width: 2,
    },
    colors: ["#f7931a"],
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0.5,
        opacityTo: 0.9,
      },
    },
    xaxis: {
      categories: [
        "01 Jan",
        "02 Jan",
        "03 Jan",
        "04 Jan",
        "05 Jan",
        "06 Jan",
        "07 Jan",
        "08 Jan",
      ],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      show: false,
      max: 170,
      min: 0,
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
        formatter: (val) => {
          return "$" + val + "K";
        },
      },
      axisBorder: {
        show: true,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: true,
        color: "#ECEEF2",
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <div className="border-0 rounded-3 mb-4 bg-warning bg-opacity-10 p-4">
        <div className="d-flex align-items-center">
          <div className="flex-shrink-0">
            <Image
              src="/images/cardano.png"
              className="rounded-circle"
              width={48}
              height={48}
              alt="cardano"
            />
          </div>
          <div className="flex-grow-1 ms-2">
            <span className="mb-1 d-block fw-medium text-secondary">
              CARDANO <span className="text-body fw-normal">(CAR)</span>
            </span>
            <div className="d-flex">
              <h3 className="mb-0 fs-20 fw-semibold me-1">$0.38</h3>
              <span className="material-symbols-outlined fs-16 position-relative top-3 text-success">
                trending_up
              </span>
              <span className="text-success">+2.3%</span>
            </div>
          </div>
        </div>

        <div>
          {Chart && (
            <Chart options={options} series={series} type="area" height={120} />
          )}
        </div>

        <div className="d-flex justify-content-between align-items-center">
          <div>
            <span className="fs-12 fw-medium d-block mb-1">Market Cap:</span>
            <h4 className="fs-12 fw-semibold mb-0">$25B</h4>
          </div>
          <div>
            <span className="fs-12 fw-medium d-block mb-1">Volume (24h):</span>
            <h4 className="fs-12 fw-semibold mb-0">$1.3B</h4>
          </div>
        </div>
      </div>
    </>
  );
};

export default Cardano;
