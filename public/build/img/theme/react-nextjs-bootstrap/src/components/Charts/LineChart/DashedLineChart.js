"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const DashedLineChart = () => {
  const [Chart, setChart] = useState(null);

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Session Duration",
      data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10],
    },
    {
      name: "Page Views",
      data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35],
    },
    {
      name: "Total Visits",
      data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: true,
      },
    },
    colors: ["#796df6", "#00cae3", "#605DFF"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 5,
      curve: "straight",
      dashArray: [0, 8, 5],
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
        offsetX: -2,
        offsetY: -0.5,
      },
    },
    markers: {
      size: 0,
      hover: {
        sizeOffset: 6,
      },
    },
    xaxis: {
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
      categories: [
        "01 Jan",
        "02 Jan",
        "03 Jan",
        "04 Jan",
        "05 Jan",
        "06 Jan",
        "07 Jan",
        "08 Jan",
        "09 Jan",
        "10 Jan",
        "11 Jan",
        "12 Jan",
      ],
    },
    tooltip: {
      y: [
        {
          title: {
            formatter: function (val) {
              return val + " (mins) ";
            },
          },
        },
        {
          title: {
            formatter: function (val) {
              return val + " per session ";
            },
          },
        },
        {
          title: {
            formatter: function (val) {
              return val + " ";
            },
          },
        },
      ],
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    yaxis: {
      tickAmount: 5,
      max: 110,
      min: 0,
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
    },
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="mb-3 mb-lg-4">
          <h3 className="mb-0">Dashed Line Chart</h3>
        </div>
        <div style={{ marginLeft: "-10px", marginBottom: "-20px" }}>
          {Chart && (
            <Chart options={options} series={series} type="line" height={350} />
          )}
        </div>
      </Card.Body>
    </Card>
  );
};

export default DashedLineChart;
