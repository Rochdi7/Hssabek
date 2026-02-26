"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const DistributedColumnChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "distibuted",
      data: [21, 22, 10, 28, 16, 21, 13, 30],
    },
  ];

  const options = {
    chart: {
      events: {
        click: function (chart, w, e) {
          // console.log(chart, w, e)
        },
      },
      toolbar: {
        show: false,
      },
    },
    colors: [
      "#605DFF",
      "#796df6",
      "#00cae3",
      "#ffb264",
      "#2ed47e",
      "#e74c3c",
      "#26a69a",
      "#d10ce8",
    ],
    plotOptions: {
      bar: {
        columnWidth: "45%",
        distributed: true,
      },
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
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
        shape: 'diamond',
        offsetX: -2,
        offsetY: -0.5,
      },
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    xaxis: {
      categories: [
        ["John", "Doe"],
        ["Joe", "Smith"],
        ["Jake", "Williams"],
        "Amber",
        ["Peter", "Brown"],
        ["Mary", "Evans"],
        ["David", "Wilson"],
        ["Lily", "Roberts"],
      ],
      labels: {
        show: true,
        style: {
          colors: [
            "#605DFF",
            "#796df6",
            "#00cae3",
            "#ffb264",
            "#2ed47e",
            "#e74c3c",
            "#26a69a",
            "#d10ce8",
          ],
          fontSize: "12px",
        },
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
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
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Distributed Column Chart</h3>
          </div>

          <div
            style={{
              marginBottom: "-20px",
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

export default DistributedColumnChart;
