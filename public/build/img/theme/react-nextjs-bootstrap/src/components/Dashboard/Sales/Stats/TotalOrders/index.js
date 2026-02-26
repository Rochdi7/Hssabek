"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TotalOrders = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Orders",
      data: [60, 50, 40, 50, 45, 30, 50, 35, 60, 45, 30, 60],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#AD63F6"],
    plotOptions: {
      bar: {
        borderRadius: 3,
        columnWidth: "9px",
        borderRadiusApplication: "end",
        borderRadiusWhenStacked: "last",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 2,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Sep",
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
      labels: {
        show: false,
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
    fill: {
      opacity: 1,
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
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
  };

  return (
    <>
      <Card className="border bg-white rounded-3 overflow-hidden mb-4">
        <div className="d-flex align-items-center p-4 pb-3 mb-1">
          <div className="flex-shrink-0">
            <div
              className="wh-55 bg-primary-div bg-opacity-25 text-center rounded-2"
              style={{ lineHeight: "55px" }}
            >
              <i className="ri-shopping-bag-3-line fs-22 bg-primary-div text-white rounded-2 p-2"></i>
            </div>
          </div>
          <div className="flex-grow-1 ms-3">
            <h3 className="fs-24 fw-medium mb-0">1,250</h3>
            <span>Total Orders</span>
          </div>
        </div>

        <div className="d-flex align-items-center p-4 pb-0">
          <span className="d-inline-block bg-success text-success bg-opacity-10 border border-success rounded-pill px-2 fw-medium d-flex align-items-center fs-12">
            <i className="ri-arrow-up-fill fs-14 lh-1"></i>
            8%
          </span>
          <span className="ms-2 fs-12">from last month</span>
        </div>

        <div style={{ margin: "-45px -11px -31px -15px" }}>
          {Chart && (
            <Chart options={options} series={series} type="bar" height={119} />
          )}
        </div>
      </Card>
    </>
  );
};

export default TotalOrders;
