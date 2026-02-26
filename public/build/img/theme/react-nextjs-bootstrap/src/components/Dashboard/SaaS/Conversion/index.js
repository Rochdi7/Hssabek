"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const Conversion = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Conversion",
      data: [20, 40, 25, 60, 30, 50],
    },
    {
      name: "Not Conversion",
      data: [20, 20, 25, 15, 35, 25],
    },
  ];

  const options = {
    chart: {
      stacked: true,
      toolbar: {
        show: false,
      },
      zoom: {
        enabled: true,
      },
    },

    plotOptions: {
      bar: {
        columnWidth: "55%",
      },
    },
    colors: ["#605DFF", "#C2CDFF"],
    grid: {
      borderColor: "#ffffff",
    },
    stroke: {
      width: 2,
      show: true,
      colors: ["transparent"],
    },
    dataLabels: {
      enabled: false,
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
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
      show: false,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
    },
    legend: {
      show: false,
      fontSize: "12px",
      position: "bottom",
      horizontalAlign: "center",
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
        shape: "diamond",
      },
    },
    fill: {
      opacity: 1,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center position-relative">
            <div className="flex-grow-1 me-3">
              <span className="d-block mb-2">Conversion</span>

              <h3 className="fs-24 fw-bold">32.5%</h3>

              <span className="bg-success bg-opacity-10 border border-success rounded-pill text-success px-2 fs-12 fw-medium d-inline-block">
                +1.4%
              </span>
            </div>

            <div className="position-absolute top-50 end-0 translate-middle-y saas-chart-position">
              <div style={{ width: "130px" }}>
                {Chart && (
                  <Chart
                    options={options}
                    series={series}
                    type="bar"
                    height={100}
                  />
                )}
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Conversion;
