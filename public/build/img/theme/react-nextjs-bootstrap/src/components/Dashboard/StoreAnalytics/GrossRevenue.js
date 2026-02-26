"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const GrossRevenue = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Sales Revenue",
      data: [35, 50, 55, 60, 50, 60, 55, 60, 78, 40],
    },

    {
      name: "Sales Volume",
      data: [80, 60, 50, 50, 72, 65, 90, 50, 70, 63],
    },
    {
      name: "Order Value",
      data: [70, 50, 40, 40, 95, 52, 80, 40, 60, 53],
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
    colors: ["#757DFF", "#E9D5FF", "#37D80A"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
      width: [3, 3, 3],
      dashArray: [0, 6, 6],
    },
    grid: {
      borderColor: "#ECF0FF",
    },
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0,
        opacityTo: 0,
      },
    },
    xaxis: {
      categories: [
        "Oct 01",
        "Oct 04",
        "Oct 08",
        "Oct 12",
        "Oct 16",
        "Oct 20",
        "Oct 24",
        "Oct 28",
        "Nov 02",
        "Nov 06",
      ],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
      },
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
          fontFamily: "Inter",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val / 1 + "K";
        },
        style: {
          colors: "#8695AA",
          fontSize: "12px",
          fontFamily: "Inter",
        },
      },
    },
    legend: {
      show: true,
      position: "bottom",
      fontSize: "12px",
      horizontalAlign: "center",
      fontFamily: "Inter",
      fontWeight: 400,
      offsetY: 10,
      itemMargin: {
        horizontal: 8,
        vertical: 10,
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
    tooltip: {
      y: {
        formatter: function (val) {
          return "$" + val + "k";
        },
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-1">
            <h3 className="mb-0">Gross Revenue</h3>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-border-color border text-body rounded-2"
              >
                Monthly
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Monthly
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Weekly
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Yearly
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div className="d-flex align-items-center mb-2">
            <h3 className="fs-32 fw-bold text-secondary mb-0">$1,528</h3>
            <span className="fw-medium fs-12 text-success bg-success bg-opacity-10 border border-success px-2 rounded-pill ms-2">
              +5.4%
              <i className="ri-arrow-up-line"></i>
            </span>
          </div>

          <span className="fs-12 d-block mb-4">vs previous 30 days</span>

          <div style={{ margin: "-24px -24px -20px -17px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={340}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default GrossRevenue;
