"use client";

import React, { useEffect, useState } from "react";
import { Card, Form} from "react-bootstrap";

const PatientByAge = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [30, 40, 20, 10];

  const options = {
    labels: ["0-18 Years", "19-40 Years", "41-60 Years", "60+ Years"],
    colors: ["#AD63F6", "#605DFF", "#25B003", "#3584FC"],
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + "%";
      },
      dropShadow: {
        enabled: false,
      },
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
      },
    },
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: true,
      fontSize: "12px",
      position: "bottom",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 7,
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
      formatter: function (seriesName, opts) {
        return [seriesName, ":", opts.w.globals.series[opts.seriesIndex], "%"];
      },
      onItemClick: {
        toggleDataSeries: false,
      },
      onItemHover: {
        highlightDataSeries: false,
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "%";
        },
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Patient by Age</h3>

            <Form.Select
              className="month-select form-control w-135"
              aria-label="Default select example"
            >
              <option defaultValue="0">Last Week</option>
              <option defaultValue="1">Last 60 Days</option>
              <option defaultValue="2">Last 90 Days</option>
            </Form.Select>
          </div>

          <div style={{ marginTop: "9px" }} className="t-chart">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="pie"
                height={305}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default PatientByAge;
