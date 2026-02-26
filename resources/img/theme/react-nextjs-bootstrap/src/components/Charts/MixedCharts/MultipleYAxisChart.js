"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const MultipleYAxisChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Income",
      type: "column",
      data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6],
    },
    {
      name: "Cashflow",
      type: "column",
      data: [1.1, 3, 3.1, 4, 4.1, 4.9, 6.5, 8.5],
    },
    {
      name: "Revenue",
      type: "line",
      data: [20, 29, 37, 36, 44, 45, 50, 58],
    },
  ];

  const options = {
    chart: {
      stacked: false,
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: [1, 1, 4],
    },
    title: {
      text: "XYZ - Stock Analysis (2009 - 2016)",
      align: "left",
      offsetX: 110,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
    xaxis: {
      categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016],
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
    yaxis: [
      {
        labels: {
          show: true,
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
        title: {
          text: "Income (thousand crores)",
          style: {
            color: "#e74c3c",
            fontWeight: 400,
          },
        },
        tooltip: {
          enabled: true,
        },
      },
      {
        seriesName: "Income",
        opposite: true,
        labels: {
          show: true,
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
        title: {
          text: "Operating Cashflow (thousand crores)",
          style: {
            color: "#0f79f3",
            fontWeight: 400,
          },
        },
      },
      {
        seriesName: "Revenue",
        opposite: true,
        labels: {
          show: true,
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
        title: {
          text: "Revenue (thousand crores)",
          style: {
            color: "#796df6",
            fontWeight: 400,
          },
        },
      },
    ],
    tooltip: {
      fixed: {
        enabled: true,
        position: "topLeft", // topRight, topLeft, bottomRight, bottomLeft
        offsetY: 30,
        offsetX: 60,
      },
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    legend: {
      horizontalAlign: "left",
      fontSize: "12px",
      offsetX: 40,
      offsetY: 5,
      show: true,
      labels: {
        colors: "#64748B",
      },
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      markers: {
        offsetX: -2,
        offsetY: -0.5,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Multiple Y-Axis Chart</h3>
          </div>

          <div
            style={{
              marginBottom: "-15px",
              marginLeft: "-10px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="line"
                height={350}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default MultipleYAxisChart;
