"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const RevenueByServices = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Facial",
      data: [44, 22, 7, 57, 44, 57, 18, 43, 24],
    },
    {
      name: "Manicure",
      data: [13, 23, 10, 13, 13, 13, 13, 13, 13],
    },
    {
      name: "Pedicure",
      data: [11, 17, 6, 15, 11, 15, 11, 11, 11],
    },
    {
      name: "Hair Cut",
      data: [21, 7, 25, 21, 21, 21, 21, 21, 21],
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
    colors: ["#82FC5A", "#D7B5FD", "#90C7FF", "#9CAAFF"],
    dataLabels: {
      style: {
        fontSize: "10px",
        fontFamily: "Inter",
        fontWeight: "700",
        colors: ["#343A46"],
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "55%",
        borderRadius: 6,
        borderRadiusApplication: "end", // 'around', 'end'
        borderRadiusWhenStacked: "last", // 'all', 'last'
        dataLabels: {
          total: {
            enabled: false,
          },
        },
      },
    },
    xaxis: {
      show: true,
      categories: [
        "Oct 01",
        "Oct 02",
        "Oct 03",
        "Oct 04",
        "Oct 05",
        "Oct 06",
        "Oct 07",
        "Oct 08",
        "Oct 09",
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
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      show: true,
      tickAmount: 6,
      //max: 100,
      min: 0,
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    grid: {
      borderColor: "#ECF0FF",
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
    fill: {
      opacity: 1,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
            <div>
              <h3 className="mb-0">Revenue By Services</h3>
            </div>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-border-color border text-body rounded-2"
              >
                This Monthly
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Day
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Week
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Month
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Year
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ margin: "-24px -24px -20px -17px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={320}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RevenueByServices;
