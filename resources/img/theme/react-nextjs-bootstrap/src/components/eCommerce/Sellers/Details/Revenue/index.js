"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const Revenue = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Orders",
      data: [28, 50, 90, 95, 20, 70, 35],
    },
    {
      name: "Earnings",
      data: [80, 60, 70, 30, 45, 20, 80],
    },
    {
      name: "Refunds",
      data: [32, 23, 78, 35, 65, 35, 15],
    },
    {
      name: "Conversion Rate",
      data: [60, 25, 80, 25, 15, 40, 15],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: true,
      },
    },
    colors: ["#605DFF", "#3584FC", "#AD63F6", "#FD5812"],
    plotOptions: {
      bar: {
        columnWidth: "50%",
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
      width: 5,
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
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
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
        shape: 'diamond',
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Revenue: $23.91k</h3>
          </div>

          <div
            style={{
              marginBottom: "-22px",
              marginLeft: "-13px",
              marginTop: "-8px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={460}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Revenue;
