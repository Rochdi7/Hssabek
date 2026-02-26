"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const NetProfit = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Net Profit",
      data: [30, 70, 80, 95, 90, 20, 40],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#37D80A"],
    plotOptions: {
      bar: {
        columnWidth: "30%",
        rangeBarOverlap: false,
        isFunnel3d: false,
        colors: {
          ranges: [
            {
              from: 0,
              to: 0,
              color: undefined,
            },
          ],
          backgroundBarColors: ["#37D80A"],
          backgroundBarOpacity: 0.2,
          backgroundBarRadius: 0,
        },
      },
    },
    fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
        inverseColors: false,
        shade: "light",
        type: "vertical",
        opacityFrom: 0.85,
        opacityTo: 0.55,
        stops: [0, 100, 100, 100],
      },
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 0,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
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
    yaxis: {
      tickAmount: 4,
      max: 100,
      min: 0,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
        formatter: (val) => {
          return "$" + val + "";
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
    tooltip: {
      y: {
        formatter: (val) => {
          return "$" + val + "K";
        },
      },
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-2 mb-4">
            <div>
              <div className="d-flex align-items-center">
                <span>Net Profit</span>

                <span className="d-inline-block px-2 bg-success bg-opacity-10 text-success border border-success rounded-pill fs-12 fw-medium ms-2">
                  +7.6%
                </span>
              </div>
              <h3 className="fs-20 mt-1 mb-0">$42,458</h3>
            </div>
            <span className="fs-12">Last 7 days</span>
          </div>

          <div style={{ margin: "-24px -20px -28px -18px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={168}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default NetProfit;
