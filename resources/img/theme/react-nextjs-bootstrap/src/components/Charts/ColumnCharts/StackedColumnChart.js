"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const StackedColumnChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Product A",
      data: [44, 55, 41, 67, 22, 43],
    },
    {
      name: "Product B",
      data: [13, 23, 20, 8, 13, 27],
    },
    {
      name: "Product C",
      data: [11, 17, 15, 15, 21, 14],
    },
    {
      name: "Product D",
      data: [21, 7, 25, 13, 22, 8],
    },
  ];

  const options = {
    chart: {
      stacked: true,
      toolbar: {
        show: true,
      },
      zoom: {
        enabled: true,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
      },
    },
    colors: ["#605DFF", "#00cae3", "#ffb264", "#e74c3c"],
    xaxis: {
      type: "category",
      categories: [
        "01/2024",
        "02/2024",
        "03/2024",
        "04/2024",
        "05/2024",
        "06/2024",
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
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    legend: {
      position: "right",
      fontSize: "12px",
      offsetY: 40,
      labels: {
        colors: "#64748B",
      },
      itemMargin: {
        horizontal: 0,
        vertical: 5,
      },
      markers: {
        shape: 'diamond',
        offsetX: -2,
        offsetY: -0.5,
      },
    },
    fill: {
      opacity: 1,
    },
    yaxis: {
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
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Stacked Column Chart</h3>
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
                type="bar"
                height={350}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default StackedColumnChart;
